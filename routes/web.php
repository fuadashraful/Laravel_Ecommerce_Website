<?php

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

// Route::get('/', function () {
//     return view('base');
// });



// frontend route ..........


Route::get('/','HomeController@home');


// Backend Route  ..............
Route::get('/admin/admin_logout','SuperAdminController@logout');
Route::get('admin/login/','AdminController@login');
Route::get('admin/dashboard/','AdminController@dashboard');
Route::post('admin/login_authenticate/','AdminController@admin_login_authenticate');

// Category related Route
Route::get('/admin/add-category','CategoryController@index');
Route::get('/admin/show-category','CategoryController@showCategory');
Route::post('admin/save-category/','CategoryController@saveCategory');
#Route::get('')