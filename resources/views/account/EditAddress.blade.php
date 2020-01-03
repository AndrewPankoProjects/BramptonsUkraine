@extends('layouts.app')

@section('title')
<!--Title-->
<h1 class="text-center">My Account Details : Edit Address</h1>
<div style="text-align: center;">
<a role ="button" href="{{ url('/orderhistory') }}" class="btn btn-outline-primary btn-lg">Check Order History</a>
</div>
@endsection

@section('content')
<!--Edit Address-->
<div class ="text-center">
  <a role="button" class = "btn btn-warning" href="{{url('changepassword')}}">Change Password</a>
  <a role="button" class = "btn btn-danger" href="{{url('security')}}">Set Security Question</a>
  <a role="button" class = "btn btn-primary"  href="{{url('account')}}">Account Details</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">

            <form action="/address/{{Auth::user()->user_id}}" method="post">
            @method('PUT')
            @csrf
            <h1 class="text-center"><strong>Edit Address:</strong></h1>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name ="address" id="address" placeholder="123 Main St.">
              </div>
                <div class="form-group col-md-4">
                  <label for="country">Country:</label>
                  <input type="text" class="form-control" name ="country" id="country" placeholder="Ex. Canada">
                </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="city">City:</label>
              <input type="text" class="form-control" name = "city"id="city">
            </div>
            <div class="form-group col-md-4">
              <label for="province">Province:</label>
              <select id="province" name="province" class="form-control">
                <option>ON</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="postalCode">Postal Code:</label>
              <input type="text" class="form-control" name ="postal_code" id="postalCode">
            </div>
            </div>
            <br>
            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary text-center">Save Changes</button>
            </div>
            </form>

          </div>
        </div>
      </div>
    </div>
@endsection
