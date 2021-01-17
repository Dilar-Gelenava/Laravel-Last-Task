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

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/index', 'ProductController@index')->name('index');

Route::post('/add_product', 'ProductController@add_product')->name('addProduct');

Route::get('/view_product/{product_id}', 'ProductController@view_product')->name('viewProduct');

Route::post('/edit_product', 'ProductController@edit_product')->name('editProduct');

Route::post('/update_product', 'ProductController@update_product')->name('updateProduct');

Route::post('/delete_product', 'ProductController@delete_product')->name('deleteProduct');

Route::post('/add_category', 'CategoryController@add_category')->name('addCategory');

Route::post('/add_comment', 'CommentController@add_comment')->name('addComment');

Route::post('/add_comment_reply', 'CommentController@add_comment_reply')->name('addCommentReply');

Route::post('/delete_comment', 'CommentController@delete_comment')->name('deleteComment');

Route::get('/category/{category_id}', 'CategoryController@get_category_products')->name('getCategoryProducts');

Route::get('/api', 'homeController@get_api_insturctions')->name('getApiInstructions');
