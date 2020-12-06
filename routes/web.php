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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/', function () {
    return view('admin.user.list');
});


/**
 * Tạo route group cho tất cả trang Admin.
 * prefix : thêm tiền tố admin vào đường dẫn được liệt kê 
 */
Route::group(['prefix' => 'admin'], function () {

    // User group. Thêm tiền tố user vào đường dẫn được liệt kê
    Route::group(['prefix' => 'user'], function () {

        Route::get('list', 'UserController@viewList'); // URL = localhost:8000/admin/user/list
        Route::get('create', 'UserController@viewCreate'); // URL = localhost:8000/admin/user/create

        Route::post('create', 'UserController@create'); // URL = localhost:8000/admin/user/create
    });
});
