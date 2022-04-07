@extends('master.home')
@section('title','Login')

@section('content')
<div class="">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3">
   <!-- to check if error register -->
   @if(Session::has('fail_login'))
   <div class="p-2 alert alert-danger">
      <span class="text-danger">{{Session::get('fail_login')}}</span>
   </div>
   @endif 

   @error('email') 
   <div class="p-2 alert alert-warning ">
      <span class="text-danger">{{$message}}</span>
   </div> 
   @enderror 
   @error('pass') 
   <div class="p-2 alert alert-warning ">
      <span class="text-danger">{{$message}}</span>
   </div> 
   @enderror

<h3 class="text-primary" style="margin-top:20px">Login Form</h3>
   <form action="{{route('user.login.submit')}}" method="POST" style="with:360px; margin-top:20px" class="p-2 border border-3">
      @csrf
      <div class="form-group mb-3">
      <div class="form-group mb-3">
         <small for="email">Email address:</small>
         <input name="email" type="email" class="form-control @error('email') in-valid @enderror" placeholder="Enter email" value="{{old('email')}}">
      </div>
      <div class="form-group mb-3">
         <small for="pass">Password:</small>
         <input name="pass" type="password" class="form-control @error('pass') in-valid @enderror" placeholder="Enter password">        
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
   </form>
</div>
</div>
</div>
@endsection