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
Route::get('/coba', function(){
    return view('theme');
});

Route::get('/', 'FrontController@index')->name('home');
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/product/show/{slug}', 'FrontController@showProduct')->name('product.show');
Route::get('/category', 'FrontController@category')->name('category');
Route::get('/category/{id}/{slug}', 'FrontController@categoryProduct')->name('category.list');
Route::get('/product/filter', 'FrontController@filter')->name('product.filter');
Route::get('/product/search', 'FrontController@search')->name('product.search');
Route::get('/about_us', 'FrontController@about_us')->name('about_us');
Route::get('/term_condition', 'FrontController@term_condition')->name('term_condition');
Route::get('/faq', 'FrontController@tutorial')->name('tutorial');
Route::get('/shop/profile/{shop_name}', 'ShopController@shop_detail')->name('shop_detail');
Route::get('/notif/{name}', 'NotifController@index')->name('notif');

Auth::routes();
Route::get('/register', 'Auth\RegisterController@getRegister')->name('register');
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
/*
|--------------------------------------------------------------------------
|   ADMIN
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/home', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/admin/product', 'Admin\ProductController@index')->name('admin.product');
    Route::get('/admin/product/search', 'Admin\ProductController@search')->name('admin.product.search');
    Route::get('/admin/product/nonactive/{id}', 'Admin\ProductController@nonactive')->name('admin.product.nonactive');
    Route::get('/admin/product/active/{id}', 'Admin\ProductController@active')->name('admin.product.active');
});

/*
|--------------------------------------------------------------------------
|   MEMBER
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'member'], function () {
    Route::get('/member', 'Member\MemberController@index')->name('member.home');
    Route::get('/member/profile', 'Member\MemberController@profile')->name('member.profile');
    Route::get('/member/profile/edit', 'Member\MemberController@edit')->name('member.edit');
    Route::post('/member/profile/update', 'Member\MemberController@update')->name('member.update');

    Route::get('/member/product/create', 'Member\ProductController@create')->name('member.product.create');
    Route::post('/member/product/store', 'Member\ProductController@store')->name('member.product.store');
    
    Route::get('/member/preview/product/{slug}', 'Member\MemberController@preview_product')->name('member.preview_product');
    Route::get('/member/notif', 'Member\MemberController@notif')->name('member.notif');

    Route::post('/product/review', 'Member\MemberController@store_review')->name('member.review');

    Route::get('/member/paket', 'Member\MemberController@paket')->name('member.paket');
});