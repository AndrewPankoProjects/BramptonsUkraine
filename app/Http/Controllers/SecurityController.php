<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SecurityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  //  public function __construct()
  //  {
    //    $this->middleware('guest');
  //  }

    public function update(Request $request, $id)
    {
      $post = User::find($id);
      $post->security_question = $request->input('selectSubject');
      $post->security_answer = $request->input('answer');
      $post->save();

      //$address = Address::fin
      return redirect('security')->with('success', 'If you forget your password you can use this to login!');
    }
}
?>
