<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function create(Request $request)
    {
        $products = Product::get();
        return view("stocks.create",[
          'products' => $products,
        ]);
    }
    public function saveCreated(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'product'   => 'required',
              'amount'  => 'required',
              'location'  => 'required',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $stock = new Stock;
            $stock->product_id = $request->product;
            $stock->recent = $request->amount;
            $stock->withdraw = 0;
            $stock->warehouse = $request->location;
            $stock->creator = Auth::user()->id;
            $stock->save();
            Toastr::success('A new Stock has been created','Success');
            return back();
        }
    }
    public function getStock(Request $request)
    {
        $stocks = Stock::get();
        return view("stocks.list",[
            'stocks' => $stocks,
        ]);
    }
    public function NewlyAddedStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'restock'  => 'required',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $stockID = $request->post('stock_id');
            $renew_stock = $request->post('restock');
            $get_stock = Stock::where('id',$stockID)->first();
            $current_stock = $get_stock->recent;

            $stock = Stock::find($stockID);
            $stock->recent = $current_stock+$renew_stock;
            $stock->save();
            Toastr::success('Stock has been added','Success');
            return back();
        }
    }
    public function withdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'withdraw'  => 'required',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $stockID = $request->post('stock_id');
            $withdraw_stock = $request->post('withdraw');
            $get_stock = Stock::where('id',$stockID)->first();
            $current_stock = $get_stock->recent;

            $stock = Stock::find($stockID);
            $stock->recent = $current_stock-$withdraw_stock;
            $stock->withdraw = $withdraw_stock;
            $stock->save();
            Toastr::success('Stock has been withdrawn','Success');
            return back();
       }
    }
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'stock'  => 'required',
              'location'  => 'required',
           ]);

        if ($validator->fails()){
            Toastr::warning('Error occured',$validator->errors()->all()[0]);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $stockID = $request->post('stock_id');
            $new_stock = $request->post('stock');
            $new_location = $request->post('location');
            $get_stock = Stock::where('id',$stockID)->first();
            $current_stock = $get_stock->recent;

            $stock = Stock::find($stockID);
            $stock->recent = $new_stock;
            $stock->withdraw = 0;
            $stock->warehouse = $request->location;
            $stock->save();
            Toastr::success('Stock has been edited','Success');
            return back();
        }
    }
    public function delete(Request $request)
    {
      $stock_id = $request->post('stock_id');
      $delete_stock = Stock::where('id',$stock_id)->delete();

      Toastr::success('Stock has been removed','Success');
      return back();
    }
}
