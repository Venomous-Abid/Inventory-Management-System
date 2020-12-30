<?php

namespace App\Http\Controllers;

use App\Category;
use App\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::all();
        return view("category.create",[
            'categories' => $categories,
        ]);
    }
    public function saveCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'category_name'   => 'required|min:3',
           ]);
        if ($validator->fails())
        {
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
          $category = new Category;
          $category->name = $request->category_name;
          $category->created_by = Auth::user()->id;
          $category->save();
          Toastr::success('A new Category has been created','Success');
          return back();
        }
    }
    public function saveSubCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'subcategory_name'   => 'required|min:3',
              'category'   => 'required',
           ]);
        if ($validator->fails())
        {
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $subcategory = new Sub_category;
            $subcategory->name = $request->subcategory_name;
            $subcategory->category_id = $request->category;
            $subcategory->created_by = Auth::user()->id;
            $subcategory->save();
            Toastr::success('A new Sub-category has been created','Success');
            return back();
        }
    }
    public function getCategory(Request $request)
    {
      $categories = Category::all();
      $subcategories = Sub_category::all();
      return view("category.category_list",[
          'categories' => $categories,
          'subcategories' => $subcategories,
      ]);
    }
    public function deleteCategory(Request $request)
    {
      $category_id = $request->post('category_id');

      $delete_category = Category::where('id',$category_id)->delete();

      Toastr::success('Category has been removed','Success');
      return back();
    }
    public function deleteSubcategory(Request $request)
    {
      $subcategory_id = $request->post('subcategory_id');

      $delete_subcategory = Sub_category::where('id',$subcategory_id)->delete();

      Toastr::success('Sub-category has been removed','Success');
      return back();
    }
    public function editCategory(Request $request,$id)
    {
      return view("category.category_edit",[
          'category' => Category::find($id),
      ]);
    }
    public function editSubcategory(Request $request,$id)
    {
      $categories = Category::get();
      return view("category.subcategory_edit",[
          'subcategory' => Sub_category::find($id),
          'categories' => $categories,
      ]);
    }
    public function editUpdateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'category_name'   => 'required|min:3',
           ]);
        if ($validator->fails())
        {
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $categoryId = $request->post('category_id');

            $category = Category::find($categoryId);
            $category->name = $request->category_name;
            $category->save();

            Toastr::success('Category has been updated','Success');
            return back();
        }
    }
    public function editUpdateSubcategory(Request $request)
    {
          $validator = Validator::make($request->all(), [
                'subcategory_name'   => 'required|min:3',
                'category'   => 'required',
             ]);
          if ($validator->fails())
          {
              Toastr::warning('Error occured',$validator->errors()->all()[0]);
              return redirect()->back()->withInput()->withErrors($validator);
          }
          else
          {
              $subcategoryId = $request->post('subcategory_id');

              $subcategory = Sub_category::find($subcategoryId);
              $subcategory->name = $request->subcategory_name;
              $subcategory->category_id = $request->category;
              $subcategory->save();

              Toastr::success('Sub-category has been updated','Success');
              return back();
          }
    }
}
