<?php

use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\User;
use App\Http\Controllers\User_Controller;
use Illuminate\Support\Facades\Route;




Route::get('/',[Product_Controller::class,"home"]);



Route::get('/add_products', [Product_Controller::class,"add_products"])->middleware('auth');


Route::get('/account', function () {
    return view('account');
})->name("accout");

// Route::get('/cart', function () {
//     return view('cart');
// });

Route::get('/send_mail',[Product_Controller::class,'send_mail'])->name("email");
Route::resource('/products', Product_Controller::class);

Route::resource('/user',User_Controller::class);

Route::get("/rl"   ,[Admin_Controller::class,'show']);
Route::post('/add_cart',[Product_Controller::class,"add_cart"]);
Route::get('/cart', [Product_Controller::class,"view_cart"]);
Route::get('/remove/{rowid}', [Product_Controller::class,"remove_cart"]);
Route::get('/delete_product/{id}', [Product_Controller::class,"delete_product"]);
Route::post('/update_prod/{id}', [Product_Controller::class,"update_product"]);
Route::post('/products/valid', [Product_Controller::class,"valid"]);
?>