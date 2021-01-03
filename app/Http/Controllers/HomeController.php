<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Sub_category;
use App\Manager;
use App\Staff;
use App\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getProCount = Product::count();
        $getCatCount = Category::count();
        $getSubcatCount = Sub_category::count();
        $getStaffCount = Staff::count();
        $getManagerCount = Manager::count();
        $getStockCount = Stock::count();
        return view('home',[
          'getProCount' => $getProCount,
          'getCatCount' => $getCatCount,
          'getSubcatCount' => $getSubcatCount,
          'getStaffCount' => $getStaffCount,
          'getManagerCount' => $getManagerCount,
          'getStockCount' => $getStockCount,
        ]);
    }
}
