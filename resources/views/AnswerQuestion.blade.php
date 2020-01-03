@extends('layouts.app')

@section('title')
   <h1 class="text-center">Password Recovery</h1>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
  <div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">
<form action="/security/answerquestion" method="post">
@csrf
  <div class="form-group">
    <label for="username">Enter Username: </label>
    <input type="text" class="form-control" name = "username" id="username" placeholder="Username" required>
  </div>

  <h1 class="text-center"><strong>Security Question:</strong></h1>
  <!-- Question1 -->
      <div class="form-group">
        <label for="question">Question:</label>
        <select class="form-control" name = "selectSubject" id="selectSubject">
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
        <input type="text" class="form-control" name = "answer" id="answer">
      </div>
      <br>
      <div style="text-align:center;">
        <button type="submit" class="btn btn-primary text-center">Submit</button>
      </div>
</form>
</div>
</div>
</div>
</div>
@endsection
