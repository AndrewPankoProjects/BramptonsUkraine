@extends('layouts.app')

@section('title')
   <h1 class="text-center">Survey</h1>
@endsection

@section('content')
<form action="{{ action('SurveyController@store') }}" method = "POST" >
  @csrf
<div class = "row" style="margin: 50px;">
  <div class="col-6" style="border: 2px solid gray; border-radius: 5px; padding: 10px;">
      <div class="form-group">
          <label for="question1">How satisfied are you with the website?</label>
          <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="question1" id="answer1" value="Very Satisfied">
          <label class="form-check-label" for="answer1">Very Satisfied</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="question1" id="answer2" value="Somewhat Satisfied">
          <label class="form-check-label" for="answer2">Somewhat Satisfied</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="question1" id="answer3" value="Dissatisfied">
          <label class="form-check-label" for="answer3">Dissatisfied</label>
        </div>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="question1" id="answer4" value="Very Dissatisfied">
          <label class="form-check-label" for="answer4">Very Dissatisfied</label>
        </div>
      </div>
      <br>
      <div class="form-group">
        <label for="question2">How easy was it to use the website?</label>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="question2" value="Very Easy">
        <label class="form-check-label" for="answer5">Very Easy</label>
      </div>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="question2"  value="Somewhat">
        <label class="form-check-label" for="answer6">Somewhat</label>
      </div>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="question2" value="Not Very">
        <label class="form-check-label" for="answer7">Not Very</label>
      </div>
      <br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="question" value="Not at all">
        <label class="form-check-label" for="answer8">Not at all</label>
      </div>
    </div>
  </div>
    <div class="col-6" style="margin: auto; border: 2px solid gray; border-radius: 5px; padding: 10px;">
      <div class="form-group">
        <label for="feedbackTextArea">Please include ANY feedback that would help improve the functionality of the website or anything that improve your experience.</label>
        <textarea type ="input" class="form-control" name = "feedback" id="feedbackTextArea" placeholder="I really like the way the website looks, and is easy to navigate!"rows="5"></textarea>
      </div>
      <div style = "text-align: center;">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
@endsection
