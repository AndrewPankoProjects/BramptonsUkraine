@extends('layouts.app')
@section('title')
<!--Title-->
<h1 class="text-center">My Account Details : Set Security Question</h1>
<div style="text-align: center;">
<a role ="button" href="{{ url('/orderhistory') }}" class="btn btn-outline-primary btn-lg">Check Order History</a>
</div>
@endsection

@section('content')
<!--Security Question/Answer -->
<div class ="text-center">
<a role="button" class = "btn btn-warning" href="{{url('changepassword')}}">Change Password</a>
<a role="button" class = "btn btn-success"  href="{{url('editaddress')}}">Edit Address</a>
<a role="button" class = "btn btn-primary" href="{{url('account')}}">Account Details</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">
            <form action="/security/{{Auth::user()->user_id}}" method="post">
            @method('PUT')
            @csrf
              <h1 class="text-center"><strong>Security Question/Answer: (Optional)</strong></h1>
              <!-- Question1 -->
                  <div class="form-group">
                    <label for="question">Question:</label>
                    <select class="form-control" name ="selectSubject" id="selectSubject">
                      <option>Pet's Name</option>
                      <option>Highschool's Name</option>
                      <option>Favorite Sport</option>
                      <option>Favorite Movie</option>
                      <option>Favorite Food</option>
                    </select>
                  </div>
              <!-- Answer1-->
                  <div class="form-group">
                    <label for="">Answer:</label>
                    <input type="text" class="form-control" name ="answer" id="answer">
                  </div>
                  <br>
                  <div style="text-align:center;">
                    <button name ="submit" type="submit" class="btn btn-primary text-center">Save Changes</button>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
@endsection
