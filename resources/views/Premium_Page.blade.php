@extends('layouts.app')
@section('title')
   <h1 class="text-center">Premium Page</h1>
@endsection

@section('content')
  <h1>Why get premium?</h1>
  <h4>
    Have you ever had to wait in a line waiting for food? Now you can make that line disappear with Premium!
  </h4>

  <h2>Premium Benefits:</h2>
  <ul>
    <li>Order's made under a premium account will get priority over any other order to be made, delivered, and picked up.</li>
    <li>Premium account's will get additional exclusive items with their orders</li>
    <li>Premium account's get access to all recipes of the food for sale</li>
    <li>Premium lasts forever for a limited time!</li>
  </ul>

  <h2>What are you waiting for? Create an Account and Get Premium Now!</h2>
@if (!Auth::guest())
  <container>
    <label>Pay below...</label>
    <label>Total: $20.99 CDN</label>

    <form action="premiumupdate/{{Auth::user()->user_id}}" method="post">
    @method('PUT')
    @csrf
    <button class='btn btn-primary' name ="submit" type="submit">Pay Now!</button>
    </form>
  </container>
@else
  <a role="button" class="btn btn-primary btn-lg" href="{{ url('/Register_Page') }}">Register</a>
@endif

@endsection
