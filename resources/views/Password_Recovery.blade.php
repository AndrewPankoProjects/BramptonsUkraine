@extends('layouts.app')

@section('title')
   <h1 class="text-center">Password Recovery</h1>
@endsection

@section('content')
  <div class="col-6" style="margin: auto; border: 2px solid gray; border-radius: 5px; padding: 10px;">
    <form class="form-horizontal" method="POST" action="{{ route('fixpassword') }}">
            {{ csrf_field() }}
            <h1 class="text-center"><strong>Change Password:</strong></h1>
            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                <label for="username" class ="col-md-4 control-label">Enter Username: </label>

                <div class="col-md-6">
                  <input type="text" class="col-md-6 form-control" name = "username" id="username" placeholder="Username" required>
                </div>

                <label for="new-password" class="col-md-4 control-label">New Password</label>

                <div class="col-md-6">
                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                    @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                <div class="col-md-6">
                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
  </div>
@endsection
