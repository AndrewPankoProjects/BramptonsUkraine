<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Brampton's Ukraine</title>
  <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/footer.css" type="text/css"/>
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body>
  <main>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

          <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar
                <ul class="navbar-nav mr-auto">
                  <li>
                    <a href="{{ url('/shoppingcart') }}">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping Cart
                        <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}
                        </span>
                      </a>
                    </li>
                </ul>-->

    <div class="dropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       [Brampton's Ukraine]
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <a class="dropdown-item" href="{{ url('/register_login') }}">Register|Login</a>
       <a class="dropdown-item" href="{{ url('/contact') }}">Contact Us</a>
       <a class="dropdown-item" href="{{ url('/survey') }}">Survey</a>
       <a class="dropdown-item" href="{{ url('/shoppingcart') }}">Shopping Cart</a>
       <a class="dropdown-item" href="{{ url('/sales') }}">Sales</a>
       <a class="dropdown-item" href="{{ url('/delivery') }}">Delivery</a>
       <a class="dropdown-item" href="{{ url('/premium') }}">Premium Sign Up</a>
       <a class="dropdown-item" href="{{ url('/themes') }}">Change Theme</a>
       <a class="dropdown-item" href="{{ url('/account') }}">Account Details</a>
       <a class="dropdown-item" href="{{ url('/orderhistory') }}">Order History</a>
     </div>
    </div>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register_login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register_login') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      </ul>
  </div>
</nav>

     @yield('title')
     @include('inc.nav')
     @include('inc.messages')
     @yield('content')
  </main>

<footer class="w3-center">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark justify-content-center">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/register_login') }}">Register/Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/survey') }}">Survey</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/shoppingcart') }}">Shopping Cart</a>
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
</body>
</html>
