<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Session;
use DB;

class CartController extends Controller
{
    function addCart(Request $req,$product_id){
        if(!$req->session()->has('userLogin')){
            return redirect()->route('user.login');
        }else{
            $cart = new Cart;
            $cart->product_id = $product_id;
            $cart->user_id = $req->session()->get('userLogin')['id'];
            $save = $cart->save();
            if($save){
                return redirect()->route('home');
            }
        }
    }

    function cartList(Request $req){
        $userId = Session::get('userLogin')['id'];
        $cart = DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->where('carts.user_id',$userId)
                ->select('products.*','carts.id as cart_id')
                ->get();
        return view('cartlist',['cartlists'=>$cart]);
    }
    
    function removeCart($cartID){
        Cart::destroy($cartID);
        return redirect()->route('cart.list');
    }
}
