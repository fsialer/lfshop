<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::bind('product', function ($slug) {
    return \App\Product::where('slug', $slug)->firstOrFail(); 
});


Route::get('/',[
	'as'=>'store.index',
	'uses'=>'StoreController@index'
	
]);
Route::get('product/{slug}',[
	'as'=>'store.show',
	'uses'=>'StoreController@show'
	
]);

//Carrito
Route::get('cart/show',[
   'as'=>'cart.show',
    'uses'=>'CartController@show'
]);
Route::get('cart/update/{product}/{quantity}',[
   'as'=>'cart.update',
    'uses'=>'CartController@update'
]);
Route::get('cart/add/{product}',[
    'as'=>'cart.add',
    'uses'=>'CartController@add'
]);
Route::get('cart/delete/{product}',[
    'as'=>'cart.delete',
    'uses'=>'CartController@delete'
]);
Route::get('cart/trash',[
   'as'=>'cart.trash',
    'uses'=>'CartController@trash'
]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('order-detail', [
    'as'=>'order-detail',
    'uses'=>'CartController@orderDetail'
    ]);
    Route::get('payment',array(
        'as'=>'payment',
        'uses'=>'PayPalController@postPayment'
    ));
    Route::get('payment/status',array(
        'as'=>'payment.status',
        'uses'=>'PayPalController@getPaymentStatus'
    ));
});

//=========================

/*Route::get('cart/update/{product}/{quantity}',[
    'as'=>'cart.update',
    'uses'=>'CartController@update'
]);*/
/*Route::resource('store','UsersController');
Route::get('/', 'StoreController@index');*/

//Admin
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth'],function(){
    
    Route::group(['middleware'=>'admin'],function(){
        Route::get('home',['as'=>'admin.home','uses'=>'HomeController@index']);
        Route::resource('category','CategoryController');
    Route::get("category/{id}/destroy",['uses'=>'CategoryController@destroy',
		'as'=>'category.destroy']);
    Route::resource('mark','MarkController');
    Route::get("mark/{id}/destroy",['uses'=>'MarkController@destroy',
		'as'=>'mark.destroy']);
    Route::resource('product','ProductController');
    Route::get("product/{id}/destroy",['uses'=>'ProductController@destroy',
		'as'=>'product.destroy']);
    Route::resource('order','OrderController');
    Route::get("order/{id}/destroy",['uses'=>'OrderController@destroy',
		'as'=>'order.destroy']);
    Route::resource('user','UserController');
    Route::get("user/{id}/destroy",['uses'=>'UserController@destroy',
		'as'=>'user.destroy']);
    });
    
});


//====
//Autentacion
Auth::routes();
Route::get('logout',[
    'as'=>'logout',
    'uses'=>'Auth\LoginController@logout'
]);

/*Route::get('/home', 'HomeController@index');*/