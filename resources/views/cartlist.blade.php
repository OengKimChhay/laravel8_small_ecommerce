@extends('master.home')
@section('title','Cart list')

@section('content')
<div class="m-5">
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
            <!-- <div class="row"> -->
                @foreach($cartlists as $cartlist)
                <!-- <div class="col-lg-2 col-md-4 col-sm-12"> -->
                    <div class="card shadow d-flex">
                        <div class="card-body">
                        <img src="{{asset('public/images/'.$cartlist->product_gallery)}}" alt="image" class="w-100">
                        
                            {{$cartlist->product_name}}
                        </div>
                        <a href="{{route('remove.cart',$cartlist->cart_id)}}" class="btn btn-outline-primary">Remove to Cart</a>
                    </div>
                <!-- </div> -->
                @endforeach
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection