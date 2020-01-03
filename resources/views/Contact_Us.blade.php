@extends('layouts.app')
@section('title')
   <h1 class="text-center">Contact Us</h1>
@endsection

@section('content')
<div class = "row" style="margin: 50px;">
  <container class="col-6" style="border: 2px solid gray; border-radius: 5px; padding: 10px;">
    <h1>How can we make your experience better!</h1>
    <img src="{{asset('pictures/Ukrainian_Cuisine.jpg')}}" alt="picture of food" class="img-thumbnail">
  </container>
<!-- Concerns Form Box -->
  <div class="col-6" style="margin: auto; border: 2px solid gray; border-radius: 5px; padding: 10px;">
  <form action="{{ action('ContactController@store') }}" method = "POST">
    @csrf
    <div class="form-group">
      <label for="userEmail">Email address</label>
      <input type="email" name = "email" class="form-control" id="userEmail" placeholder="Enter email">
    </div>

    <div class="form-group">
      <label for="selectSubject">Select subject: (Page with issue)</label>
      <select name = "subject" class="form-control" id="selectSubject">
        <option>Register|Login</option>
        <option>Contact Us</option>
        <option>Survey</option>
        <option>Shopping Cart</option>
        <option>Sales</option>
        <option>Delivery</option>
        <option>Premium Sign Up</option>
        <option>Account Details</option>
        <option>Account Details : Changepassword</option>
        <option>Account Details : Edit Address</option>
        <option>Account Details : Set Security Question</option>
        <option>Order History</option>
        <option>Forgot Password</option>
      </select>
    </div>
    <div class="form-group">
      <label for="issueTextArea">Issue:</label>
      <textarea name ="message" class="form-control" id="issueTextArea" rows="5"></textarea>
    </div>
    <div style = "text-align: center;">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>

@endsection
