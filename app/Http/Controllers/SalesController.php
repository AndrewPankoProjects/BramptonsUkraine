<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\User;
use App\Account;
use App\Order;
//use App\VerifyUser;
//use App\Mail\OrderMail;
use App\Http\Requests;
use Session;
//use Mail;

class SalesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('Sales_Page', ['products'=> $products]);
    }

    public function getAddToCart(Request $request, $id){
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);

      $request->session()->put('cart', $cart);
      return redirect()->route('sales');
    }

    public function getCart(){
      if (!Session::has('cart')){
        return view('Shopping_Cart',['products' => null]);
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('Shopping_Cart', ['products'=>$cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
      if (!Session::has('cart')){
        return view('Shopping_Cart');
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('Shipping_Page', ['total' => $total]);
    }

    public function getPayment($deliverflag){
      if (!Session::has('cart')){
        return view('Shopping_Cart');
      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      if($deliverflag == "deliver"){
        $total = $cart->totalPrice + 5;
      }
      else{
        $total = $cart->totalPrice;
      }

      if ($deliverflag == 1){
        $total = $cart->totalPrice + 5;
        return view('Payment', ['total' => $total, 'products'=>$cart->items]);
      }
      if ($deliverflag == 0){
        $total = $cart->totalPrice;
        return view('Payment', ['total' => $total, 'products'=>$cart->items]);
      }
    }

    /*public function postCheckout(Request $request)
    {
      if (!Session::has('cart')){
        return redirect()->route('Shopping_Cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      //Mail::to($user->email)->send(new OrderMail(['products'=>$cart->items, 'totalPrice' => $cart->totalPrice]));
      Session::forget('cart');
      return redirect()->route('/')->with('success', 'Successfully purchased products! Thank you for shopping with us! :D');

    }*/

     public function update(Request $request, $id){

       //console.log($request);

       $this->validate($request, [
         'address'=>'required',
         'city'=>'required',
         'postalcode'=> 'required',
         'province'=> 'required',
         'country'=> 'required',
         'deliver'=> 'required'
       ]);

       //User::where('username', $id)->update($request->all());
       //return redirect('/thankyou');

       $user = User::find($id);
       $user->First_name = $request->input("firstname");
       $user->Last_name = $request->input("lastname");
       $user->address = $request->address;
       $user->city = $request->city;
       $user->postal_code = $request->postalcode;
       $user->province = $request->province;
       $user->country = $request->country;
       $user->delivery = $request->deliver;

       $user->save();

       if($request->deliver == "deliver"){
         $delivered = 1;
       }
       else{
         $delivered = 0;
       }

       return redirect('sales/checkout/payment/'. $delivered);

     }

     public function order(Request $request){

      // return $request;
       // FIX THIS
       $order = new Order;
       $order->Order_total = $request->input("total");

         $order->Perogies = $request->input("1");

         $order->BeetSoup = $request->input("2");

         $order->CabbageRolls = $request->input("3");

       $order->username = auth()->user()->username;;
       $order->save();

       $oldCart = Session::get('cart');
       $cart = new Cart($oldCart);
       Session::forget('cart');

       return redirect('/thankyou')->with('success', 'Order has been sent! Thank you!');
       //return redirect()->route('thankyou')->with('success', 'Order has been sent! Thank you!');
      // return redirect('/thankyou')->with('success', 'Your order has been sent! Thank you!');
     }
}
