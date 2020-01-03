<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="{{url('/')}}">Brampton's Ukraine</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNavDropdown">
   <ul class="nav navbar-nav">
     <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Us</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/sales/shoppingcart') }}">Shopping Cart</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/sales') }}">Sales</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/delivery') }}">Delivery</a></li>
     @if (!Auth::guest())
     <li class="nav-item"><a class="nav-link" href="{{ url('/account') }}">Account Details</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/survey') }}">Survey</a></li>
     <li class="nav-item"><a class="nav-link" href="{{ url('/themes') }}">Themes</a></li>
     @endif
   </ul>
   <!-- Right Side Of Navbar -->
           <ul class="nav navbar-nav navbar-right">
               <!-- Authentication Links -->
               @if (Auth::guest())
                   <li class="nav-item"><a class="nav-link"  href="{{ url('/Login_Page') }}">Login</a></li>
                   <li class="nav-item"><a class="nav-link" href="{{ url('/Register_Page') }}">Register</a></li>
               @else
               @if (Auth::user()->status == "admin")
                   <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin Page</a></li>
                   <li class="nav-item"><a class="nav-link" href="{{ url('/tracker') }}">Ingredient Tracker 1.0</a></li>
               @endif
               @if (Auth::user()->status != "premium")
                   <li class ="nav-item"><a class="nav-link" href="{{url('/premium')}}">Buy Premium Here!</a></li>
               @endif
                   <li class="dropdown nav-item mb-3 mb-md-0 ml-md-3">
                       <a class="dropdown-toggle nav-link btn btn-outline-success" data-toggle="dropdown" role="button" aria-expanded="false">
                           {{ Auth::user()->username }} <span class="caret"></span>
                       </a>
                       <label hidden class = "username" id ="{{ Auth::user()->username }}">{{ Auth::user()->username }}</label>

                       <ul class="dropdown-menu" role="menu">
                           <li><a href="{{ url('/') }}">Homepage</a></li>
                           <li>
                               <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                   Logout
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </li>
                       </ul>
                   </li>
               @endif
           </ul>
 </div>
</nav>
