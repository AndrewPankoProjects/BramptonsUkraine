<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EditAddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
  //  {
  //      $this->middleware('guest');
//    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->address = $request->input("address");
      $user->city = $request->input("city");
      $user->postal_code = $request->input("postal_code");
      $user->province = $request->input("province");
      $user->country = $request->input("country");
      $user->save();

      //$address = Address::fin
      return redirect('/editaddress')->with('success', 'Your address has been updated!');
    }
}
?>
