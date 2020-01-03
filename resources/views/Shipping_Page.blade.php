@extends('layouts.app')
@section('title')
   <h1 class="text-center">Shipping Page</h1>
@endsection

@section('content')
@if(Session::has('cart'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
            <form action="checkout/update/{{Auth::user()->user_id}}" method="post">
            @method('PUT')
            @csrf
            <label>Shipping Information</label>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="companyname">Company Name (Optional)</label>
              <input type="text" class="form-control" name="companyname" id="companyname" placeholder="Company">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="123 Main St.">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city">
              </div>
              <div class="form-group col-md-2">
                <label for="province">Province</label>
                <select name="province" id="province" class="form-control">
                  <option selected>ON</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label name="postalcode" for="postalcode">Postal Code</label>
                <input type="text" class="form-control" name = "postalcode" id="postalcode">
              </div>
              <div class="form-group col-md-3">
                <label name="country" for="country">Country</label>
                <input type="text" class="form-control" name = "country" id="country">
              </div>
            </div>
            <div class="form-row">
              <label>Delivery Options</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="deliver" id="deliver" value="pickup">
                <label class="form-check-label" for="pickup">$0.00 Pick up at 87 Narrow Valley Cres. Brampton, Ontario</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="deliver" id="deliver" value="deliver">
                <label class="form-check-label" for="deliver">$5.00 Delivery to address</label>
              </div>
            </div>
            <div style = "text-align: center;">
              <h4><strong>Total Cost: $ {{$total}}.00</strong></h4>
              <br>
               <button class='btn btn-primary' name ="submit" type="submit">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="row">
      <div class="col-sm-8" style="margin: 195px;">
          <h2 class="justify-content-center text-center">No Items in Cart!</h2>
      </div>
    </div>
    @endif
@endsection
