<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
     {
       return view('survey');
     }

    public function store(Request $request){

      $this->validate($request, [
        'question1'=>'required',
        'question2'=>'required',
        'feedback'=> 'required'
      ]);

      //Create Post
      $survey = new Survey;
      $survey->Answer1 = $request->input('question1');
      $survey->Answer2 = $request->input('question2');
      $survey->feedback = $request->input('feedback');
      $survey->username = auth()->user()->username;
      $survey->save();

      return redirect('/survey')->with('success', 'Your survey was sent to us!');
    }



}
?>
