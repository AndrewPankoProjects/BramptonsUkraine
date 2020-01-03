@extends('layouts.app')
@section('title')
   <h1 class="text-center">Ingredient Tracker</h1>
@endsection

@section('content')
  <h1 class ="text-center" style="margin-top:20px">Record the ingredients Used:</h1>

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">

              <form action="{{ action('AdminController@tracker') }}" method = "POST">
                @csrf
              <div class="form-group">
                <label for="Order ID">Order ID:</label>
                <input type="text" class="form-control" name="order_id" id="order_id" placeholder="Enter order number">
              </div>
              <div class="form-group">
                <label for="potato">Potato(s):</label>
                <input type="text" class="form-control"name ="potato" id="potato">
              </div>
              <div class="form-group">
                <label for="beet">Beet(s):</label>
                <input type="text" class="form-control" name ="beet" id="beet">
              </div>
              <div class="form-group">
                <label for="rice">Rice Bag(s):</label>
                <input type="text" class="form-control" name ="rice" id="rice">
              </div>
              <div class="form-group">
                <label for="cabbage">Cabbage(s):</label>
                <input type="text" class="form-control" name ="cabbage" id="cabbage">
              </div>
              <div class="form-group">
                <label for="flour">Flour Bag(s):</label>
                <input type="text" class="form-control" name ="flour" id="flour">
              </div>
              <div class="form-group">
                <label for="beef">Ground Beef (lbs):</label>
                <input type="text" class="form-control" name ="beef" id="beef">
              </div>
              <div class="form-group">
                <label for="tomatojuice">Bottles of Tomato Juice:</label>
                <input type="text" class="form-control" name ="tomatojuice" id="tomatojuice">
              </div>
              <div class="form-group">
                <label for="water">Water (L):</label>
                <input type="text" class="form-control" name ="water" id="water">
              </div>
              <div class="form-group">
                <label for="cheese">Blocks of Cheese:</label>
                <input type="text" class="form-control" name = "cheese" id="cheese">
              </div>
              <div style = "text-align: center;">
                <br>
                <button type="submit" class="btn btn-primary btn-lg">Track Ingredients</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection
