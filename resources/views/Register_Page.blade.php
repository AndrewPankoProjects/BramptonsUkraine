@extends('layouts.app')
@section('title')
  <h1 class="text-center">Register</h1>
  <div style="text-align: center;">
  <a role="button" href="{{ url('/premium') }}" class="btn btn-outline-primary btn-lg">Buy Premium Here!</a>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

<!--Register Column-->
  <div class="col-md-8" style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

            <div class="col-md-6">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
  </div>
</div>
</div>
<!--Login Column
<div class="col-6" style="border: 2px solid gray; border-radius: 5px; padding: 10px;">
  <button id ="login" class = "btn btn-danger text-center">Choose to login</button>
  <form id="loginform" action="{{ action('Auth\LoginController@login')  }}" method = "POST">
  @csrf
  <h1 class="text-center"> Login </h1>
    <div class="form-group">
      <label for="email">Email address</label>
      <input id="email2" type="email" class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}" name="email2" value="{{ old('email2') }}" required autocomplete="email2" autofocus>
      <small id="emailHelp" class="form-text text-muted">Enter your email above!</small>
      @if ($errors->has('email2'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email2') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-group">
      <label for="userPassword">Password</label>
      <input type="password" class="form-control" id="userPassword" placeholder="Password">
      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="rememberCheck">
      <label class="form-check-label" for="rememberCheck">Remember password?</label>
    </div>
    <br>
    <div style="text-align: center;">
    <button id="loginbtn" name="ok2" type="submit" class="btn btn-primary">Login</button>
    </div>
    <br>
    <div style="text-align: center;">
      <a href="#">Forgot password?</a>
    </div>
</form>
</div>-->


@endsection
