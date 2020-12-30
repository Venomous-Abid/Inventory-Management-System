<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout']);
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' =>'manager', 'as'=>'manager.'], function(){
        Route::get('create',['as' =>'create','uses' =>'ManagerController@create' ]);
        Route::post('save-created',['as' =>'save_created','uses' =>'ManagerController@saveCreated' ]);
        Route::get('all-managers',['as' =>'all_managers','uses' =>'ManagerController@getAllManager' ]);
        Route::get('details/{id}',['as' =>'details','uses' =>'ManagerController@detail' ]);
        Route::post('delete',['as' =>'delete','uses' =>'ManagerController@delete' ]);
        Route::get('edit/{id}',['as' =>'edit','uses' =>'ManagerController@edit' ]);
        Route::post('save-edit',['as' =>'save_edit','uses' =>'ManagerController@update']);
      });

    Route::group(['prefix' =>'staff', 'as'=>'staff.'], function(){
        Route::get('create',['as' =>'create','uses' =>'StaffController@create' ]);
        Route::post('save-created',['as' =>'save_created','uses' =>'StaffController@saveCreated' ]);
        Route::get('all-staffs',['as' =>'all_staffs','uses' =>'StaffController@getStaff' ]);
        Route::get('all-markets',['as' =>'all_markets','uses' =>'StaffController@getMarketing' ]);
        Route::get('all-accounts',['as' =>'all_accounts','uses' =>'StaffController@getAccount' ]);
        Route::get('details/{id}',['as' =>'details','uses' =>'StaffController@detail' ]);
        Route::post('delete',['as' =>'delete','uses' =>'StaffController@delete' ]);
        Route::get('edit/{id}',['as' =>'edit','uses' =>'StaffController@edit' ]);
        Route::post('save-edit',['as' =>'save_edit','uses' =>'StaffController@update']);
      });

      Route::group(['prefix' =>'category', 'as'=>'category.'], function(){
        Route::get('create',['as' =>'create','uses' =>'CategoryController@create' ]);
        Route::post('save-category',['as' =>'save_category','uses' =>'CategoryController@saveCategory' ]);
        Route::post('save-subcategory',['as' =>'save_subcategory','uses' =>'CategoryController@saveSubCategory' ]);
        Route::get('all-categories',['as' =>'all_categories','uses' =>'CategoryController@getCategory' ]);
        Route::post('delete-category',['as' =>'delete_category','uses' =>'CategoryController@deleteCategory' ]);
        Route::post('delete-subcategory',['as' =>'delete_subcategory','uses' =>'CategoryController@deleteSubcategory' ]);
        Route::get('edit-category/{id}',['as' =>'edit_category','uses' =>'CategoryController@editCategory' ]);
        Route::get('edit-subcategory/{id}',['as' =>'edit_subcategory','uses' =>'CategoryController@editSubcategory' ]);
        Route::post('update-category',['as' =>'update_category','uses' =>'CategoryController@editUpdateCategory' ]);
        Route::post('update-subcategory',['as' =>'update_subcategory','uses' =>'CategoryController@editUpdateSubcategory' ]);
      });
      Route::group(['prefix' =>'product', 'as'=>'product.'], function(){
          Route::get('create',['as' =>'create','uses' =>'ProductController@create' ]);
          Route::post('save-created',['as' =>'save_created','uses' =>'ProductController@saveCreated' ]);
          Route::get('all-product',['as' =>'all_product','uses' =>'ProductController@getProduct' ]);
          Route::get('details/{id}',['as' =>'details','uses' =>'ProductController@detail' ]);
          Route::post('delete',['as' =>'delete','uses' =>'ProductController@delete' ]);
          Route::get('edit/{id}',['as' =>'edit','uses' =>'ProductController@edit' ]);
          Route::post('save-edit',['as' =>'save_edit','uses' =>'ProductController@update']);
        });
      Route::group(['prefix' =>'stock', 'as'=>'stock.'], function(){
          Route::get('create',['as' =>'create','uses' =>'StockController@create' ]);
          Route::post('save-created',['as' =>'save_created','uses' =>'StockController@saveCreated' ]);
          Route::get('all-stock',['as' =>'all_stock','uses' =>'StockController@getStock' ]);
          Route::get('details/{id}',['as' =>'details','uses' =>'StockController@detail' ]);
          Route::post('delete',['as' =>'delete','uses' =>'StockController@delete' ]);
          Route::post('save-allstock',['as' =>'save_allstock','uses' =>'StockController@NewlyAddedStock']);
          Route::post('save-withdraw',['as' =>'save_withdraw','uses' =>'StockController@withdraw']);
          Route::post('save-edit',['as' =>'save_edit','uses' =>'StockController@edit']);
        });
});
