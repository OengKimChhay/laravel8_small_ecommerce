<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homePage(Request $req){
        if($req->has('search')){
            $search = $req->search;
            $pro = Product::where('product_name','like','%'.$search.'%')->get();
        }else{
            $pro = Product::orderBy('id','asc')->get();
        }
        return view('productPage',['products'=>$pro]);
    }
}
