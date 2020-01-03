<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
  public function create()
   {
     return view('contact');
   }

  public function store(Request $request){

    $this->validate($request, [
      'email'=>'required',
      'subject'=>'required',
      'message'=> 'required'
    ]);

    //Create Post
    $contact = new Contact;
    $contact->Issue_email = $request->input('email');
    $contact->Issue_subject = $request->input('subject');
    $contact->Issue_message = $request->input('message');
    $contact->save();

    return redirect('/contact')->with('success', 'Thank you for contacting us we will respond to you as soon as possible! (Via Email)');
  }

}
