@extends('master.home')
@section('title','produt')

@section('content')
<div class="m-5">
<a class="btn btn-outline-primary mb-3" href="{{route('home')}}">Back</a>
    <div class="card shadow">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <img src="{{asset('public/images/'.$product->product_gallery)}}" alt="image" style="height:400px">
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h4 class="mt-3 text-center">{{$product->product_name}}</h4>
            <p>{{$product->product_description}}</p>
            <p>Price: <b>{{$product->product_price}} $</b></p>
            <a href="{{ route('add-cart',$product->id) }}" class="btn btn-success">Add Cart</a>
        </div>
    </div>
    </div>
</div>
@endsection