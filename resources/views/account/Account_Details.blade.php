@extends('layouts.app')
@section('title')
<!--Title-->
<h1 class="text-center">My Account Details</h1>
<div style="text-align: center;">
<a role="button" href="{{ url('/orderhistory') }}" class="btn btn-outline-primary btn-lg">Check Order History</a>
</div>
@endsection

@section('content')
<div class="text-center">
<a role="button" class = "btn btn-warning" href="{{url('changepassword')}}">Change Password</a>
<a role="button" class = "btn btn-success"  href="{{url('editaddress')}}">Edit Address</a>
<a role="button" class = "btn btn-danger" href="{{url('security')}}">Set Security Question</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
  <form action="update/{{Auth::user()->user_id}}" method="post">
  @method('PUT')
  @csrf
    <div class="form-group">
      <label for="accountCreated">Member Since:  {{Auth::user()->created_at}}</label><br>
      <label for="premiumStatus">Premium Status: {{Auth::user()->status}} </label>
    </div>
    <!--Edit Account -->
    <div class="form-group">
      <h1 class="text-center"><strong>Edit Account:</strong></h1>
    </div>
    <div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" name ="firstname" id="firstname" placeholder="First Name">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Last Name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name ="email" id="email" placeholder="Email Address">
    </div>
    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="text" class="form-control" name ="phone" id="phone" placeholder="Phone Number">
    </div>
      <br>
      <div style="text-align:center;">
        <button type="submit" class="btn btn-primary text-center">Save Changes</button>
      </div>
    </div>
  </div>
</div>
</div>
  </form>
@endsection
