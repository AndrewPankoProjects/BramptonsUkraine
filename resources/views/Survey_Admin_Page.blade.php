@extends('layouts.app')
@section('title')
   <h1 class="text-center">Survey Page (Admin)</h1>
@endsection

@section('content')
@if (!Auth::guest() && Auth::user()->status == "admin")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
            <form action="{{ action('AdminController@changeSurvey') }}" method = "POST">
              @csrf
              <div class="form-group">
                <label for="question">Edit Question: </label>
                <input type="text" name = "question" class="form-control" id="question" placeholder="Ex. 'Question 1'">
              </div>
              <div style = "text-align: center;">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endif

@endsection
