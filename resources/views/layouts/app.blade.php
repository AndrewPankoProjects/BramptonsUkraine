<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <link rel="shortcut icon" href="{{ asset('pictures/icon2.png') }}">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Brampton's Ukraine</title>
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css')}}" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<!--  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
<script src="https://js.stripe.com/v3/"></script>


-->
<script src="{{asset('js/top.js')}}"></script>
</head>

@if (!Auth::guest() && Auth::user()->theme == "Default")
<body>
@endif

@if (!Auth::guest() && Auth::user()->theme == "White")
<body style="background-color:#ffffff;">
@endif

@if (!Auth::guest() && Auth::user()->theme == "Gray")
<body style="background-color:#737373;">
@endif

@if (!Auth::guest() && Auth::user()->theme == "Yellow")
<body style="background-color:#ffffb3;">
@endif

@if (!Auth::guest() && Auth::user()->theme == "Pink")
<body style="background-color:#ffb3b3;">
@endif

@if (Auth::guest())
<body>
@endif

  @if (!Auth::guest() && Auth::user()->status != "admin" && Auth::user()->status != "premium")
    <a role = "buttion" href ="https://www.adidas.ca/"><img src="{{asset('pictures/soccerad.jpg')}}" style = "position: absolute;height: 45px;right: 1px;width: 20%;" alt ="addidas"></a>
  @endif
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <div id = "page-container">
    <div id = "content-wrap">
  <main>
    <div class="dropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       [Brampton's Ukraine]
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       @if (Auth::guest())
       <a class="dropdown-item" href="{{ url('/Register_Page') }}">Register</a>
       <a class="dropdown-item" href="{{ url('/Login_Page') }}">Login</a>
       @endif
       <a class="dropdown-item" href="{{ url('/contact') }}">Contact Us</a>
       @if (!Auth::guest())
       <a class="dropdown-item" href="{{ url('/survey') }}">Survey</a>
       <a class="dropdown-item" href="{{ url('/account') }}">Account Details</a>
       <a class="dropdown-item" href="{{ url('/themes') }}">Themes</a>
       @endif
       <a class="dropdown-item" href="{{ url('/sales/shoppingcart') }}">Shopping Cart</a>
       <a class="dropdown-item" href="{{ url('/sales') }}">Sales</a>
       <a class="dropdown-item" href="{{ url('/delivery') }}">Delivery</a>
       <a class="dropdown-item" href="{{ url('/premium') }}">Premium Sign Up</a>
       @if (!Auth::guest() && Auth::user()->status == "admin")
           <a class="nav-link" href="{{ url('/admin') }}">Admin Page</a>
           <a class="nav-link" href="{{ url('/tracker') }}">Ingredient Tracker 1.0</a>
       @endif
       @if (!Auth::guest() && Auth::user()->status != "premium")
           <li class ="nav-item"><a class="nav-link" href="{{url('/premium')}}">Buy Premium Here!</a></li>
       @endif
     </div>
     @yield('title')
     @include('inc.nav')
     @include('inc.messages')
     @yield('content')
  </main>
</div>

<footer id = "footer" class="page-footer w3-center">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
      </li>
      @if (Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/Register_Page') }}">Register</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
      </li>
      @if (!Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/survey') }}">Survey</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/sales/shoppingcart') }}">Shopping Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/sales') }}">Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/delivery') }}">Delivery</a>
      </li>
  </ul>
  </nav>
</footer>
</div>
</body>
</html>
