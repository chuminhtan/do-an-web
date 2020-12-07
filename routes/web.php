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
        Route::get('info/{user_id}', 'UserController@viewInfo'); // URL = localhost:8000/admin/user/info/{user_id}

        Route::get('delete/{user_id}', 'UserController@delete'); // URL = localhost:8000/admin/user/delete/{user_id}
        Route::post('create', 'UserController@create');
        Route::post('edit', 'UserController@edit');
    });

    // Category group
    Route::group(['prefix' => 'category'], function () {
        Route::get('list', 'CategoryController@viewList'); // URL = localhost:8000/admin/category/list
        Route::get('create', 'CategoryController@viewCreate'); // URL = localhost:8000/admin/category/create
        Route::get('info/{category_id}', 'CategoryController@viewInfo'); // URL = localhost:8000/admin/category/info/{category_id}

        Route::post('create', 'CategoryController@create'); // URL = localhost:8000/admin/category/create
        Route::post('edit', 'CategoryController@edit'); // URL = localhost:8000/admin/category/edit/{category_id}
        Route::get('delete/{category_id}', 'CategoryController@delete'); // URL = localhost:8000/admin/category/delete/{category_id}
    });

    // Product group
    Route::group(['prefix' => 'product'], function () {
        Route::get('list', 'ProductController@viewList'); // URL = localhost:8000/admin/product/list
        Route::get('create', 'ProductController@viewCreate'); // URL = localhost:8000/admin/product/create
        Route::get('info/{product_id}', 'ProductController@viewInfo'); // URL = localhost:8000/admin/product/create

        Route::post('create', 'ProductController@create'); // URL = localhost:8000/admin/product/create
        Route::post('edit', 'ProductController@edit'); // URL = localhost:8000/admin/product/edit/{product_id}
        Route::get('delete/{product_id}', 'ProductController@delete'); // URL = localhost:8000/admin/product/delete/{product_id}
    });
});
