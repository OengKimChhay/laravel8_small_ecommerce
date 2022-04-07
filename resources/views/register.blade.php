@extends('master.home')
@section('title','Registration')

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
        <h3 class="text-primary" style="margin-top:20px">Register Form</h3>
            <form action="{{route('user.store')}}" method="POST" style="with:360px; margin-top:20px" class="p-2 border border-3">
                @csrf
                <div class="form-group mb-3">
                    <small for="name">Name:</small>
                    <input name="name" type="text" class="form-control @error('name') in-valid @enderror" placeholder="Enter Name" value="{{old('name')}}"> 
                    @error('name')
                    <small class="text-danger">{{$message}}</small>
                    @enderror        
                </div>
                <div class="form-group mb-3">
                    <small for="email">Email address:</small>
                    <input name="email" type="email" class="form-control @error('email') in-valid @enderror" placeholder="Enter Email" value="{{old('email')}}">
                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror 
                </div>
                <div class="form-group mb-3">
                    <small for="pass">Password:</small>
                    <input name="pass" type="password" class="form-control @error('pass') in-valid @enderror" placeholder="Enter password" autocomplete>   
                    @error('pass')
                    <small class="text-danger">{{$message}}</small>
                    @enderror      
                </div>
                <div class="form-group mb-3">
                    <small for="re_pass">Confirm Password:</small>
                    <input  name="re_pass" type="password" class="form-control @error('re_pass') in-valid @enderror" placeholder="Enter re-password" autocomplete>
                    @error('re_pass')
                    <small class="text-danger">{{$message}}</small>
                    @enderror 
                </div>
                <button  type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection