<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">lsdkf</a></li>
              <li><a class="dropdown-item" href="#">lsdkf</a></li>
          </ul>
        </li>
        
         @if(session('userLogin')) <!--userLogin is the session in UserLogincontroller loginSubmit -->
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Session::get('userLogin')['name']}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <li><a class="dropdown-item" href="{{route('user.logout')}}">Log out</a></li>
              <li><a class="dropdown-item" href="{{route('product.index')}}">Show Product</a></li>
              <li><a class="dropdown-item" href="{{route('product.create')}}">Add Product</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.index')}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.login')}}">Login</a>
        </li>
        @endif
        <li><a class="nav-link" href="{{route('cart.list')}}">Cart({{$cartItem}})</a></li>
      </ul>
    </div>
  </div>
</nav>