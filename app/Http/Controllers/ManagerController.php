<?php

namespace App\Http\Controllers;

use App\Manager;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function create(Request $request)
    {
      return view("managers.create");
    }
    public function saveCreated(Request $request)
    {
      $validator = Validator::make($request->all(), [
              'name'   => 'required|min:3',
              'email'  => 'required|email',
              'phone' => 'required|min:11|max:13',
              'password'  => 'required|min:8',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
          }
        else
        {
          $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->access_level = User::ACCESS_LEVEL_MANAGER;
          $user->password = bcrypt($request->password);
          $user->save();
          $manager = new Manager;
          $manager->user_id = $user->id;
          $manager->phone = $request->phone;
          $manager->address = $request->address;
          if($request->file('photo'))
          {
            $image = $request->file('photo');
            $new_name = Auth::user()->id . '_m_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('manager_photo'), $new_name);
            $manager->image = $new_name;
          }
          $manager->save();
          Toastr::success('A new Manager has been created','Success');
          return back();
        }
    }
    public function getAllManager(Request $request)
    {
        $managers = Manager::get();
        return view("managers.all_managers",[
            'managers' => $managers,
        ]);
    }
    public function detail(Request $request, $id)
    {
        return view('managers.detail',[
          'manager' => Manager::find($id),
        ]);
    }
    public function edit(Request $request, $id)
    {
        return view('managers.edit',[
          'manager' => Manager::find($id),
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'name'   => 'required|min:3',
              'email'  => 'required|email',
              'phone' => 'required|min:11|max:13',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
          }
        else
        {
            $managerId = $request->post('manager_id');
            $userId = $request->post('user_id');
            $get_manager = Manager::where('id',$managerId)->first();
            $image_link = $get_manager->image;
            $userId = $get_manager->user_id;

            $user = User::find($userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $manager = Manager::find($managerId);
            $manager->phone = $request->phone;
            $manager->address = $request->address;
            if($request->photo)
            {
                $path_image = public_path().'/manager_photo/'. $image_link;
                unlink($path_image);
            }
            if($request->photo)
            {
                $image = $request->file('photo');
                $new_name = Auth::user()->id . 'm_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('manager_photo'), $new_name);
                $manager->image = $new_name;
            }
            $manager->save();
            Toastr::success('Manager has been edited','Success');
            return back();
        }
    }
    public function delete(Request $request)
    {
        $manager_id = $request->post('manager_id');

        $get_manager = Manager::where('id',$manager_id)->first();
        $image_link = $get_manager->image;
        if($image_link != null)
        {
          $path_image = public_path().'/manager_photo/'. $image_link;
          unlink($path_image);
        }

        $user_id = Manager::where('id',$manager_id)->pluck('user_id');
        $delete_user = User::where('id',$user_id)->delete();
        $delete_manager = Manager::where('id',$manager_id)->delete();

        Toastr::success('Manager has been deleted','Success');
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
