@extends('master.home')
@section('title','Add Product')

@section('content')
<div class="">
<!-- to check if success register -->
    @if(Session::has('success'))
   <div class="p-2 m-1 alert alert-success alert-dismissible fade show" role="alert">
      <span >{{Session::get('success')}}</span>
      <button type="button" class="p-2 m-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @elseif(Session::has('fail'))
   <div class="p-2 m-1 alert alert-warning alert-dismissible fade show" role="alert">
      <span >{{Session::get('fail')}}</span>
      <button type="button" class="p-2 m-1 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3">
        <h3 class="text-primary" style="margin-top:20px">Add Product</h3>
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" style="with:360px; margin-top:20px" class="p-2 border border-3">
                @csrf
                <div class="form-group mb-3">
                    <small for="product_name">Product Name:</small>
                    <input name="product_name" type="text" class="form-control @error('product_name') in-valid @enderror" placeholder="Enter Product Name" value="{{old('product_name')}}"> 
                    @error('product_name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror        
                </div>
                <div class="form-group mb-3">
                    <small for="product_price">Product Price:</small>
                    <input name="product_price" type="number" class="form-control @error('product_price') in-valid @enderror" placeholder="Enter Product Price" value="{{old('product_price')}}"> 
                    @error('product_price')
                    <small class="text-danger">{{$message}}</small>
                    @enderror        
                </div>
                <div class="form-group mb-3">
                    <small for="product_description">Product Description:</small>
                    <input name="product_description" type="text" class="form-control @error('product_description') in-valid @enderror" placeholder="Enter Product Description" value="{{old('product_description')}}"> 
                    @error('product_description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror        
                </div>
                <div class="form-group mb-3">
                    <small for="product_cetegory">Product Cetegory:</small>
                    <input name="product_cetegory" type="text" class="form-control @error('product_cetegory') in-valid @enderror" placeholder="Enter Product Cetegory" value="{{old('product_cetegory')}}"> 
                    @error('product_cetegory')
                    <small class="text-danger">{{$message}}</small>
                    @enderror        
                </div>
                <div class="form-group mb-3">
                    <small for="image">Choose Image</small>
                    <img class="mt-2 mb-2" src="" id="preview" width="100%" />
                    <input id="image"  name="image" type="file" class="form-control @error('image') in-valid @enderror" placeholder="Choose Image">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror 
                </div>
                <button  type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- to show preview gallery -->
<script type="text/javascript">
   $(document).ready(function (e) {
      $('#image').change(function(evnet){
         $('#preview').attr('src',URL.createObjectURL(evnet.target.files[0]));
      });

      // one way also work ;)
    //   $('#image').change(function(evnet){
    //      var reader = new FileReader();
    //      reader.onload = (e) => {
    //         $('#preview').attr('src', e.target.result);
    //      }
    //      reader.readAsDataURL(this.files[0]);
    //   });
   });
</script>
@endsection