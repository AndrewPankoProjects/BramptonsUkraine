<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Auth;
use Hash;
//use App\Address;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::all();
        //return Post::all();
        return view('Posts.index')->with('posts', $posts);
    }

    public function orders(){

      $orders = Order::all();

      return response()->json([
       'orders'=>$orders
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //print_r($id);
        $post =  Post::find($id);
        return view('Posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = User::find($id);
      $post->First_name = $request->input("firstname");
      $post->Last_name = $request->input("lastname");
      $post->email = $request->input("email");
      $post->Phone_number = $request->input("phone");
      $post->save();

      return redirect('/account')->with('success', 'Account details have been saved.');
    }

    public function premiumupdate($id)
    {
      $post = User::find($id);
      $post->status= "premium";
      $post->save();

      return redirect('/premium')->with('success', 'Premium has been added to you account.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }

    public function changeTheme(Request $request)
    {
      if($request->input("username") != Auth::user()->username){
        return redirect('/themes')->with('danger', 'Wrong username');
      }

      elseif (User::where('username', $request->input("username"))->first() == null)
      {
        return redirect('/themes')->with('danger', 'Wrong username');
      }

      else
      {
        $post = User::where('username', $request->input("username"))->first();

        $post->theme = $request->input("theme");

        $post->save();

        return redirect('/themes')->with('success', 'Themes has been updated!');
      }
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function verifyUser(Request $request){
        if (User::where('username', $request->input("username"))->first() == null){
            return redirect('/AnswerQuestion')->with("error","Wrong answer or username doesn't exist.");
        }
        else{
          $user = User::where('username', $request->input("username"))->first();

          if($user->security_question == $request->input("selectSubject")){
            if($user->security_answer == $request->input("answer")){
              return redirect('/passwordrecovery');
            }
            return redirect('/AnswerQuestion')->with("error","Wrong answer or username doesn't exist.");
          }
          return redirect('/AnswerQuestion')->with("error","Wrong answer or username doesn't exist.");
        }
    }
}
