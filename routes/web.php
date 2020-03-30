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
Route::get('/admin/toggle_category_status/{category_id}/{category_status}','CategoryController@toggleCategoryStatus');
Route::get('/admin/update_category/{category_id}','CategoryController@updateCategory');
Route::put('/admin/update_post/{category_id}','CategoryController@update_post');
Route::get('/admin/delete_category/{category_id}','CategoryController@delete_category');




// Manufacture related Route

Route::get('/admin/add_manufacture/','ManufactureController@add_manufacture');
Route::post('/admin/save-manufacture/','ManufactureController@save_manufacture');
Route::get('/admin/show-manufacture/','ManufactureController@show_manufacture');
Route::get('/admin/toggle_manufacture_status/{manufacture_id}/{manufacture_status}/','ManufactureController@toggleManufactureStatus');
Route::get('/admin/delete_manufacturerer/{id}','ManufactureController@delete_manufacture');
Route::get('/admin/update_manufacture/{id}','ManufactureController@update_manufacture');
Route::put('/admin/update_manufacture_post/{id}','ManufactureController@update_manufacture_post');