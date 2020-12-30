<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function create(Request $request)
    {
      return view("staffs.create");
    }
    public function saveCreated(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'name'   => 'required|min:3',
              'email'  => 'required|email',
              'phone' => 'required|min:11|max:13',
              'type_staff'=> 'required',
              'password'  => 'required|min:8',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

        if ($validator->fails())
        {
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
          $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->access_level = User::ACCESS_LEVEL_STAFF;
          $user->password = bcrypt($request->password);

          $user->save();
          $staff = new Staff;
          $staff->user_id = $user->id;
          $staff->phone = $request->phone;
          $staff->address = $request->address;
          if($request->post('type_staff') == 0)
          {
             $staff->access_level = Staff::ACCESS_LEVEL_MARKET;
          }
          elseif($request->post('type_staff') == 1)
          {
             $staff->access_level = Staff::ACCESS_LEVEL_ACCOUNT;
          }
          $staff->created_by = Auth::user()->id;
          if($request->file('photo'))
          {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_s_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff_photo'), $new_name);
             $staff->image = $new_name;
          }
           $staff->save();
          Toastr::success('A new Staff has been created','Success');
          return back();
       }
    }
    public function getStaff(Request $request)
    {
        $staffs = Staff::get();
        return view("staffs.all_staffs",[
            'staffs' => $staffs,
        ]);
    }
    public function getMarketing(Request $request)
    {
        $staffs = Staff::where('access_level','Marketing')->get();
        return view("staffs.marketing_only",[
          'staffs' =>$staffs,
        ]);
    }
    public function getAccount(Request $request)
    {
        $staffs = Staff::where('access_level','Account')->get();
        return view("staffs.account_only",[
          'staffs' => $staffs,
        ]);
    }
    public function detail(Request $request, $id)
    {
        return view('staffs.detail',[
          'staff' => Staff::find($id),
        ]);
    }
    public function edit(Request $request, $id)
    {
        return view('staffs.edit',[
          'staff' => Staff::find($id),
        ]);
    }
    public function update(Request $request)
    {
        $staffId = $request->post('staff_id');
        $userId = $request->post('user_id');
        $get_staff = Staff::where('id',$staffId)->first();
        $image_link = $get_staff->image;
        $userId = $get_staff->user_id;

        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $staff = Staff::find($staffId);
        $staff->phone = $request->phone;
        $staff->address = $request->address;

        if($request->post('type_staff') == 0)
        {
           $staff->access_level = Staff::ACCESS_LEVEL_MARKET;
        }
        elseif($request->post('type_staff') == 1)
        {
           $staff->access_level = Staff::ACCESS_LEVEL_ACCOUNT;
        }


        if($request->photo)
        {
            $path_image = public_path().'/staff_photo/'. $image_link;
            unlink($path_image);
        }

        if($request->photo)
        {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . 's_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('staff_photo'), $new_name);
            $staff->image = $new_name;
        }
        $staff->save();
        Toastr::success('Staff has been edited','Success');
        return back();
    }
    public function delete(Request $request)
    {
        $staff_id = $request->post('staff_id');

        $get_staff = Staff::where('id',$staff_id)->first();
        $image_link = $get_staff->image;
        if($image_link != null)
        {
          $path_image = public_path().'/staff_photo/'. $image_link;
          unlink($path_image);
        }

        $user_id = Staff::where('id',$staff_id)->pluck('user_id');
        $delete_user = User::where('id',$user_id)->delete();
        $delete_Staff = Staff::where('id',$staff_id)->delete();

        Toastr::success('Staff has been deleted','Success');
        return back();
    }
    private function uniqueString()
    {
        $m = explode(' ', microtime());
        list($totalSeconds, $extraMilliseconds) = array($m[1], (int)round($m[0] * 1000, 3));
        $txID = date('YmdHis', $totalSeconds) . sprintf('%03d', $extraMilliseconds);
        $txID = substr($txID, 2, 15);
        return $txID;
    }
}
