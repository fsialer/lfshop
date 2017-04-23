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
Route::get('category/{slug}',[
	'as'=>'store.search.category',
	'uses'=>'StoreController@searchCategory'
	
]);
Route::get('category/{slug}/{slug2}',[
	'as'=>'store.search.subcategory',
	'uses'=>'StoreController@searchSubCategory'
	
]);
/*Route::get('category/{slug}/{slug2}/{slug3}',[
	'as'=>'store.search.typeproduct',
	'uses'=>'StoreController@SearchTypeProduct'
	
]);*/
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
    Route::resource('account','AccountController');
    Route::get('account/{id}/recovery',array(
        'as'=>'account.recovery',
        'uses'=>'AccountController@recovery'
    ));
    Route::put('account/change/{account}',array(
        'as'=>'account.change',
        'uses'=>'AccountController@change'
    ));
    Route::get('account/{id}/order',array(
        'as'=>'account.order',
        'uses'=>'AccountController@order'
    ));
    Route::get('account/{id}/order/{order}',array(
        'as'=>'account.detail',
        'uses'=>'AccountController@detail'
    ));
   Route::get("ajax2/municipality",['uses'=>'Ajax2Controller@municipality',
		'as'=>'ajax2.municipality']);  
     Route::get("ajax2/city",['uses'=>'Ajax2Controller@city',
		'as'=>'ajax2.city']);  
    Route::resource('address','AddressController');
    Route::get('address/{id}/destroy',array(
        'as'=>'address.destroy',
        'uses'=>'AddressController@destroy'
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
    Route::resource('subcategory','SubCategoryController');
    Route::get("subcategory/{id}/destroy",['uses'=>'SubCategoryController@destroy',
		'as'=>'subcategory.destroy']);
    Route::resource('mark','MarkController');
    Route::get("mark/{id}/destroy",['uses'=>'MarkController@destroy',
		'as'=>'mark.destroy']);
    Route::resource('typeproduct','TypeProductController');
    Route::get("typeproduct/{id}/destroy",['uses'=>'TypeProductController@destroy',
		'as'=>'typeproduct.destroy']);
    Route::resource('product','ProductController');
    Route::get("product/{id}/destroy",['uses'=>'ProductController@destroy',
		'as'=>'product.destroy']);
    Route::resource('image','ImageController');
    Route::get("image/{id}/destroy",['uses'=>'ImageController@destroy',
		'as'=>'image.destroy']);
    Route::resource('order','OrderController');
    Route::get("order/{id}/destroy",['uses'=>'OrderController@destroy',
		'as'=>'order.destroy']);
    Route::resource('user','UserController');
    Route::get("user/{id}/destroy",['uses'=>'UserController@destroy',
		'as'=>'user.destroy']);
    Route::resource('region','RegionController');
    Route::get("region/{id}/destroy",['uses'=>'RegionController@destroy',
		'as'=>'region.destroy']);
    Route::resource('municipality','MunicipalityController');
    Route::get("municipality/{id}/destroy",['uses'=>'MunicipalityController@destroy',
		'as'=>'municipality.destroy']);
    Route::resource('city','CityController');
    Route::get("city/{id}/destroy",['uses'=>'CityController@destroy',
		'as'=>'city.destroy']);
  
    //Reportes PDF
    Route::get("pdf/product",['uses'=>'PdfController@product',
		'as'=>'pdf.product']);
    Route::get("pdf/{id}/order",['uses'=>'PdfController@order',
		'as'=>'pdf.order']);
      //Ajax
        
   Route::get("ajax/municipality",['uses'=>'AjaxController@municipality',
		'as'=>'ajax.municipality']);  
    Route::get("ajax/subcategory",['uses'=>'AjaxController@subcategory',
		'as'=>'ajax.subcategory']);  

    
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