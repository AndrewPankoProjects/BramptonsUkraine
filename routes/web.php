<?php
use App\User;
use App\Contact;
use App\Survey;
use App\Order;
use App\Tracker;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'PagesController@index');


Route::get('/', function () {
    return view('Homepage');
});

Route::get('/Register_Page', function () {
    return view('Register_Page');
});

Route::get('/Login_Page', function () {
    return view('Login_Page');
});

Route::get('/account', function () {
    return view('Account_Details');
});

Route::get('/contact', function () {
    return view('Contact_Us');
});

Route::get('/survey', function () {
    return view('Survey_Page');
});

Route::get('/delivery', function () {
    return view('Delivery_Page');
});

Route::get('/orderhistory', function () {
    return view('Order_History');
});

Route::get('/themes', function () {
    return view('Themes_Page');
});

Route::get('/premium', function () {
    return view('Premium_Page');
});

Route::get('/thankyou', function () {
    return view('Thankyou');
});

Route::get("/sales/checkout/payment/{deliverflag}",[
    'uses' => 'SalesController@getPayment',
    'as' => 'payment'
]);

Route::get('/getRequest', function(){
if(Request::ajax()){
    $users = User::all();
    $survey = Survey::all();
    $issues = Contact::all();
    $orders = Order::all();
    $tracker = Tracker::all();

    return response()->json([
     'records'=>$users,
     'survey'=>$survey,
     'issues'=>$issues,
     'orders'=>$orders,
     'tracker'=>$tracker
    ]);
  }
});

Route::get('/getHistory', [
  'uses' => 'AccountController@orders',
  'as' => 'history'
]);

Route::get('/sales', [
  'uses' => 'SalesController@index',
  'as' => 'sales'
]);

Route::get('/sales/add-to-cart/{id}',[
  'uses' => 'SalesController@getAddToCart',
  'as' => 'addToCart'
]);

Route::get('/sales/shoppingcart',[
  'uses' => 'SalesController@getCart',
  'as' => 'Shopping_Cart'
]);

Route::get("/sales/checkout",[
    'uses' => 'SalesController@getCheckout',
    'as' => 'checkout'
]);

Route::get('/shipping', function () {
    return view('Shipping_Page');
});

Route::put('/sales/checkout/update/{id}', 'SalesController@update');
Route::put('/premiumupdate/{id}', 'AccountController@premiumupdate');
Route::put('/updateProduct/{id}', 'AdminController@changeProduct');
//Route::post('checkout/payment', 'SalesController@order');

Route::put('/update/{id}', 'AccountController@update');
Route::put('/security/{id}', 'SecurityController@update');
//Route::put('/changepassword/{id}', 'PasswordController@update');
Route::post('/changePassword','AccountController@changePassword')->name('changePassword');
Route::put('/address/{id}', 'EditAddressController@update');

Route::post('/security/answerquestion', 'AccountController@verifyUser');
Route::post('/fixpassword','PasswordController@fixpassword')->name('fixpassword');

Route::get('/passwordrecovery', function () {
    return view('Password_Recovery');
});

Route::get('/AnswerQuestion', function () {
    return view('AnswerQuestion');
});

Auth::routes();

Route::post('survey', 'SurveyController@store');
Route::post('contact', 'ContactController@store');
Route::post('payment', 'SalesController@order');
Route::post('sales', 'AdminController@changeProduct');
Route::post('themes', 'AccountController@changeTheme');
Route::post('tracker', 'AdminController@tracker');
Route::get('admin', 'PagesController@admin');
Route::get('tracker', 'PagesController@tracker');
Route::get('orderhistory', 'PagesController@history');

Route::get('/account', function () {
    return view('account.Account_Details');
});

Route::get('/changepassword', function () {
    return view('account.ChangePassword');
});

Route::get('/security', function () {
    return view('account.SecurityQuestion');
});


Route::get('/editaddress', function () {
    return view('account.EditAddress');
});

Route::delete('userdelete/{id}', 'AdminController@destroy1');
Route::delete('surveydelete/{id}', 'AdminController@destroy2');
Route::delete('issuesdelete/{id}', 'AdminController@destroy3');

Route::post('giveadmin/{id}', 'AdminController@giveAdminFunction');
Route::post('dumpadmin/{id}', 'AdminController@dumpAdminFunction');
Route::post('completeorder/{id}', 'AdminController@completeOrderFunction');
Route::post('updateOrder/{id}', 'AdminController@currentOrder');

Route::post('tracker', 'AdminController@tracker');

//Shopping Process
//-----------------------------
//Route::view('/Sales_Page','sales');
//Route::view('/product','product');
//Route::view('/shopping_cart','cart');
//Route::view('/shipping_page','checkout');
//Route::view('/thankyou','thankyou');

/*Route::get('/sales', function () {
    return view('Sales_Page');
});*/

//Route::post('/sales/checkout', 'SalesController@store');

/*Route::post('/sales/checkout', [
  'uses'=> 'SalesController@postCheckout',
  'as'=> 'checkout'
]);*/

URL::forceScheme('https');
