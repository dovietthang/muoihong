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

Route::get('/', 'client\HomeController@index')->name('homepage');
Route::get('/danh-sach-san-pham/{id?}', 'client\HomeController@list_product')->name('list_product');
Route::get('/chi-tiet-san-pham/{id?}', 'client\HomeController@detail_product')->name('detail_product');
Route::post('/dang-ki-thanh-vien','client\MemberController@create_member')->name('registration.member');
Route::get('/lien-he','client\HomeController@contact')->name('client.contact');
Route::post('/dang-ki-thanh-vien','client\MemberController@create_member')->name('registration.member');
Route::post('/save-contact','client\HomeController@submit_contact')->name('save.contact');
Route::get('/danh-muc/{id?}/{slug?}','client\HomeController@list_post')->name('list_post');
Route::get('/chi-tiet/{id?}/{slug?}','client\HomeController@detail_post')->name('detai_post');
//login member
Route::post('/login','client\MemberController@postLogin')->name('login');
Route::any('/logout','client\MemberController@postLogout')->name('logout');
// login admin
Route::get('/admincp','Auth\LoginController@formLogin')->name('form.login');
Route::post('/admin-login','Auth\LoginController@AdminLogin')->name('admin.login');
Route::get('/admin-logout','Auth\LoginController@AdminLogout')->name('admin.logout');
Route::post('/forgot-password','client\MemberController@send_email')->name('forgot_password');
Route::prefix('thanh-vien')->group(function (){
    Route::get('/', 'client\MemberController@detail_member')->name('detail_member');
    Route::post('/update-member', 'client\MemberController@update_member')->name('update_member');
    Route::get('/doi-mat-khau', 'client\MemberController@change_password')->name('change_password');
    Route::get('/update-password', 'client\MemberController@update_password')->name('update_password');
    Route::get('/tra-cuu', 'client\MemberController@tra_cuu')->name('tra_cuu');
    Route::get('/don-hang-chiet-khau', 'client\MemberController@don_hang_chiet_khau')->name('don_hang_chiet_khau');
    Route::get('/danh-sach-thanh-vien', 'client\MemberController@danh_sach_thanh_vien')->name('danh_sach_thanh_vien');
    Route::get('/gio-hang', 'client\MemberController@cart')->name('cart');
    Route::any('/thanh-toan', 'client\MemberController@pay')->name('pay');
    Route::get('/tra-cuu/{id?}','client\MemberController@list_product')->name('list_order_product');
    Route::get('/don-hang-chiet-khau/{id?}','client\MemberController@list_product_discount')->name('list_product_discount');
});
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', 'admin\HomeController@index')->name('admin');
    Route::get('/config', 'admin\HomeController@config')->name('config');
    Route::post('/config-save', 'admin\HomeController@configsave')->name('configsave');
    Route::prefix('category')->group(function (){
        Route::get('/{check_cate?}', 'admin\CategoryController@index')->name('category');
        Route::get('update-status/{id?}', 'admin\CategoryController@update_status');
        Route::get('destroy/{id?}', 'admin\CategoryController@destroy');
        Route::get('create/{check_cate?}', 'admin\CategoryController@create')->name('category.create');
        Route::get('edit/{id?}/{check_cate?}', 'admin\CategoryController@edit')->name('category.edit');
        Route::post('save/{id?}', 'admin\CategoryController@save')->name('category.save');
    });
    Route::prefix('product')->group(function (){
        Route::get('/', 'admin\ProductController@index')->name('product');
        Route::get('update-status/{id?}', 'admin\ProductController@update_status');
        Route::get('destroy/{id?}', 'admin\ProductController@destroy');
        Route::get('create', 'admin\ProductController@create')->name('product.create');
        Route::get('edit/{id?}', 'admin\ProductController@edit')->name('product.edit');
        Route::post('save/{id?}', 'admin\ProductController@save')->name('product.save');
    });
    Route::prefix('post')->group(function (){
        Route::get('/', 'admin\PostController@index')->name('post');
        Route::get('update-status/{id?}', 'admin\PostController@update_status');
        Route::get('destroy/{id?}', 'admin\PostController@destroy');
        Route::get('create', 'admin\PostController@create')->name('post.create');
        Route::get('edit/{id?}', 'admin\PostController@edit')->name('post.edit');
        Route::post('save/{id?}', 'admin\PostController@save')->name('post.save');
    });
    Route::prefix('member')->group(function (){
        Route::get('/', 'admin\MemberController@index')->name('member');
        Route::get('update-status/{id?}', 'admin\MemberController@update_status');
        Route::get('destroy/{id?}', 'admin\MemberController@destroy');
        Route::get('create', 'admin\MemberController@create')->name('member.create');
        Route::get('edit/{id?}', 'admin\MemberController@edit')->name('member.edit');
        Route::post('save/{id?}', 'admin\MemberController@save')->name('member.save');
    });
    Route::prefix('order')->group(function (){
        Route::get('/', 'admin\OrderController@index')->name('order');
        Route::get('update-status/{id?}', 'admin\OrderController@update_status');
        Route::get('destroy/{id?}', 'admin\OrderController@destroy');
        Route::get('list-order-product/{id?}', 'admin\OrderController@list_product')->name('order.order_product');

    });
    Route::prefix('contact')->group(function (){
        Route::get('/', 'admin\HomeController@contact')->name('contact');
        Route::get('/delete-contact/{id?}', 'admin\HomeController@delete_contact');
    });
});

