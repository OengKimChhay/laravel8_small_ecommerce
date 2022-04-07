@extends('master.home')
@section('title','produt')

@section('content')
<div class="m-5">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card shadow">
                    <img src="{{asset('public/images/'.$product->product_gallery)}}" alt="image" class="w-100">
                        <div class="card-body">
                            <a href="{{route('product.show',$product->id)}}">{{$product->product_name}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- for search -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-header">
                    Search
                </div>
                <div class="card-body">
                <form class="d-flex">
                    <input name="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection