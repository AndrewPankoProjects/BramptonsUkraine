@extends('layouts.app')
@section('title')
<!--Title-->
<h1 class="text-center">My Account Details : Change Password</h1>
<div style="text-align: center;">
<a role = "button" href="{{ url('/orderhistory') }}" class="btn btn-outline-primary btn-lg">Check Order History</a>
</div>
@endsection

@section('content')
<!--Change Password-->
<div class ="text-center">
  <a role="button" class = "btn btn-success"  href="{{url('editaddress')}}">Edit Address</a>
  <a role="button" class = "btn btn-danger" href="{{url('security')}}">Set Security Question</a>
  <a role="button" class = "btn btn-primary" href="{{url('account')}}">Account Details</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">
  <form action="{{ route('changePassword') }}" method="post" >
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
          <label for="new-password">Current Password</label>
          <div>
              <input id="current-password" type="password" class="form-control" name="current-password" required>

              @if ($errors->has('current-password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('current-password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
          <label for="new-password">New Password</label>

          <div>
              <input id="new-password" type="password" class="form-control" name="new-password" required>

              @if ($errors->has('new-password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('new-password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <label for="new-password-confirm">Confirm New Password</label>

          <div>
              <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
          </div>
      </div>

      <div class="form-group">
          <div class="text-center">
              <button type="submit" class="btn btn-primary">
                  Change Password
              </button>
          </div>
      </div>
  </form>
</div>
</div>
</div>
</div>
@endsection
