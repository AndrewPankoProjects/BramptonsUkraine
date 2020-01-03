<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        return view('Homepage');
    }

    public function admin(){
      return view('admin');
    }

    public function tracker(){
      return view('Ingredient_Tracker');
    }

    public function history(){
      return view('Order_History');
    }

    public function password(){
      return view('account.ChangePassword');
    }

    public function address(){
      return view('account.EditAddress');
    }

    public function security(){
      return view('account.SecurityQuestion');
    }
}
