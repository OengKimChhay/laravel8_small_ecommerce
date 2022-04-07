<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_cetegory' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        // for file secure
        if($req->hasFile('image')){
            $image = $req->file('image');
            $desitate_path = 'public/images';
            $imageName = time().'.'.$req->image->getClientOriginalName(); // to get image name and convert to number;            $img_resize->move($desitate_path,$imageName); //to store image
            $image->move($desitate_path,$imageName);
        }

        $pro = new Product;
        $pro->product_name = $req->product_name;
        $pro->product_price = $req->product_price; 
        $pro->product_description =$req->product_description; 
        $pro->product_cetegory =$req->product_cetegory;
        $pro->product_gallery = $imageName; // $data->image will be store file name in database as string
        $create = $pro->save();
        // to check if data has been saved!
        if($create){
            return redirect()->back()->with('success','Product has been added!');
        } else{
            return redirect()->back()->with('fail','there is something wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = Product::where('id',$id)->first();
        return view('productDetail',['product'=>$pro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
