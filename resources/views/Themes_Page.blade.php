@extends('layouts.app')
@section('title')
   <h1 class="text-center">Themes Page</h1>
@endsection

@section('content')
@if (!Auth::guest())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
            <form action="{{ action('AccountController@changeTheme') }}" method = "POST">
              @csrf
                <input type="text" class="form-control" name ="username" id="username" value ="{{ Auth::user()->username }}" hidden>
              <div class="form-group">
                <label for="title">Select Theme: </label>
                <select name = "theme" class="form-control" id="theme">
                  <option>Default</option>
                  <option>White</option>
                  <option>Gray</option>
                  <option>Yellow</option>
                  <option>Pink</option>
                </select>
              </div>
              <div style = "text-align: center;">
                <button type="submit" class="btn btn-primary">Change Theme!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endif

@endsection
