<?php
namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  //  public function __construct()
  //  {
        //$this->middleware('guest');
  //  }
  public function __construct()
   {
       $this->middleware('guest');
   }

    public function fixpassword(Request $request){
        $validatedData = $request->validate([
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = User::where('username', $request->input("username"))->first();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully. Try logging back in.");

    }
}
?>
