<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Models\Cart;
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
//     return view('welcome');
// });
Route::group(['middleware'=>'PreventBackHistory'],function(){
    Route::get('/',[HomeController::class,'homePage'])->name('home');
    Route::resource('user/product',ProductController::class);
    Route::resource('user',UserController::class);
    Route::get('user-login/',[UserLoginController::class,'login'])->name('user.login');
    Route::post('user-login/',[UserLoginController::class,'submitLogin'])->name('user.login.submit');
    // to logout user
    Route::get('/logout',[UserLoginController::class,'logout'])->name('user.logout');
    Route::get('/add-cart/{product_id}',[CartController::class,'addCart'])->name('add-cart');
    Route::get('/cart-list',[CartController::class,'cartList'])->name('cart.list');
    Route::get('/remove-cart/{cartID}',[CartController::class,'removeCart'])->name('remove.cart');
});




// this for share cartItem to all view
View::composer(['*'],function($view){ // '*' mean that we can share data to all view but if we want to specific view we can ['admin.category','home',...] mean file name
    if(Session::get('userLogin')){
        $userId = Session::get('userLogin')['id'];
        $cartItem = Cart::where('user_id',$userId)->count();
        $view->with('cartItem',$cartItem);  //USER is variable we use all view
    }else{
        $view->with('cartItem',0); 
    }
});