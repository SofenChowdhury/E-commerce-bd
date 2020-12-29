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
    return view('admin.dashboard');
});
Route::get('subcategories/{id}','ProductController@loadSubcategories');
Route::resource('category','CategoryController');
Route::resource('subcategory','SubcategoryController');
Route::resource('product','ProductController');

//Route::get('/index', function () {
//    return view('admin.dashboard');
//});
//
//Route::get('/index/test', function () {
//    return view('test');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
