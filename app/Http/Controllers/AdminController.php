<?php
namespace App\Http\Controllers;

use App\User;
use App\Survey;
use App\Contact;
use App\Order;
use App\Tracker;
use App\Product;

use Illuminate\Http\Request;

class AdminController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function destroy1($id)
    {
        $post = User::find($id);
        $post->delete();

        $posts = User::all();
        return response()->json(['records'=>$posts]);
    }

    public function destroy3($id)
    {
        $post = Contact::find($id);
        $post->delete();

        $posts = Contact::all();
        return response()->json(['issues'=>$posts]);
    }

    public function destroy2($id)
    {
        $post = Survey::find($id);
        $post->delete();

        $posts = Survey::all();
        return response()->json(['survey'=>$posts]);
    }

    public function giveAdminFunction($id){
       $post = User::find($id);
       $post->status = "admin";
       $post->save();

       $post = User::all();
       return response()->json(['records'=>$post]);
    }

    public function completeOrderFunction($id){
       $post = Order::find($id);
       if($post->Order_status == null){
         $post->Order_status = "Complete";
       }
       $post->save();

       $post = Order::all();
       return response()->json(['orders'=>$post]);
    }

    public function dumpAdminFunction($id){
       $post = User::find($id);
       $post->status = null;

       $post->save();

       $post = User::all();
       return response()->json(['records'=>$post]);
    }

    public function tracker(Request $request){
      //Create order quantity
      $survey = new Tracker;
      $survey->order_id = $request->input("order_id");
      $survey->potato = $request->input('potato');
      $survey->beet = $request->input('beet');
      $survey->cabbage = $request->input('cabbage');
      $survey->beef = $request->input('beef');
      $survey->tomatojuice = $request->input('tomatojuice');
      $survey->water = $request->input('water');
      $survey->cheese = $request->input('cheese');
      $survey->flour = $request->input('flour');
      $survey->rice = $request->input('rice');
      $survey->save();

      return redirect('/tracker')->with('success', 'Order has been tracked. Check Admin Page!');
    }

    public function updateOrder($id){
       $post = Order::find($id);
       $post->status = null;

       $post->save();

       $post = User::all();
       return response()->json(['records'=>$post]);
    }

    public function changeProduct(Request $request)
    {
      if (Product::where('title', $request->input("title"))->first() == null)
      {
        return redirect('/sales')->with('danger', 'Product is non-existent');
      }
      else
      {
        $post = Product::where('title', $request->input("title"))->first();

        $post->title = $request->input("title");

        if($request->input("url") != ""){
          $post->imagePath = $request->input("url");
        }
        if($request->input("desc") != ""){
          $post->description = $request->input("desc");
        }
        if($request->input("price") != ""){
          $post->price = $request->input("price");
        }
        $post->save();

        return redirect('/sales')->with('success', 'Product has been updated!');
      }
    }
  }
