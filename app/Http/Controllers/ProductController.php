<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Sub_category;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::get();
        return view("product.create",[
            'categories' => $categories,
        ]);
    }
    public function saveCreated(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'name'   => 'required|min:3',
              'category'  => 'required',
              'sub_category'  => 'required',
              'color' => 'required',
              'desc'  => 'required',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
          }
        else
        {
            $product = new Product;
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->color = $request->color;
            $product->desc_product = $request->desc;
            $product->creator = Auth::user()->id;
            if($request->file('photo'))
            {
              $image = $request->file('photo');
              $new_name = Auth::user()->id . '_pro_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('product_photo'), $new_name);
              $product->image = $new_name;
            }
            $product->save();
            Toastr::success('A new Product has been created','Success');
            return back();
        }
    }
    public function getProduct(Request $request)
    {
        $products = Product::get();
        return view("product.list",[
            'products' => $products,
        ]);
    }
    public function detail(Request $request, $id)
    {
      return view("product.detail",[
          'product' => Product::find($id),
      ]);
    }
    public function edit(Request $request, $id)
    {
      $categories = Category::get();
      return view("product.edit",[
          'product' => Product::find($id),
          'categories' => $categories,
      ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'name'   => 'required|min:3',
              'category'  => 'required',
              'sub_category'  => 'required',
              'color' => 'required',
              'desc'  => 'required',
              'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $productID = $request->post('product_id');
            $get_product = Product::where('id',$productID)->first();
            $image_link = $get_product->image;

            $product = Product::find($productID);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->color = $request->color;
            $product->desc_product = $request->desc;

            if($request->photo)
            {
                $path_image = public_path().'/product_photo/'. $image_link;
                unlink($path_image);
            }

            if($request->file('photo'))
            {
              $image = $request->file('photo');
              $new_name = Auth::user()->id . '_pro_' . self::uniqueString() . '.' . $image->getClientOriginalExtension();
              $image->move(public_path('product_photo'), $new_name);
              $product->image = $new_name;
            }
            $product->save();
            Toastr::success('Product has been updated','Success');
            return back();
        }
    }
    public function delete(Request $request)
    {
      $product_id = $request->post('product_id');
      $get_product = Product::where('id',$product_id)->first();
      $image_link = $get_product->image;

      if($image_link != null)
      {
        $path_image = public_path().'/product_photo/'. $image_link;
        unlink($path_image);
      }

      $delete_product = Product::where('id',$product_id)->delete();

      Toastr::success('Product has been deleted','Success');
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
