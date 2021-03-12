<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes(['verify' => true]);

Route::get('/invite/KM{leader_id}', 'CreateInvite@index')->name('invite');


Route::get('/test1', function () {
    return view('HQMembershipEmail');
})->name('/test1');

//Route::get('{leader_id}/invite1', 'CreateInvite@index')->name('invite1');

//
//Route::get('{leader_id}/invite', function ($leader_id) {
//    return view('pages.User.Invite.index',['leader_id' => $leader_id]);
//});

Route::get('toyyibpay/{order_id}','ToyyibpayController@createBill')->name('toyyibpay-create');
Route::get('toyyibpay-status','ToyyibpayController@paymentStatus')->name('toyyibpay-status');
Route::post('toyyibpay-callback','ToyyibpayController@callback')->name('toyyibpay-callback');
Route::get('toyyibpay-return-url','ToyyibpayController@returnURL')->name('toyyibpay-return-url');

Route::get('billplz/{order_id}','BillplzController@createBill')->name('billplz-create');
Route::post('billplz-callback','BillplzController@callBack')->name('billplz-callback');
Route::get('billplz-return-url/{order_id}','BillplzController@returnURL')->name('billplz-return-url');


Route::get('senang-pay/{order_id}','SenangpayController@createPayment')->name('senang-pay-create');
Route::get('senang-pay-returl-url', 'SenangpayController@callback');
Route::get('get-senang-pay-data', 'SenangpayController@getSenangPayData');
//Route::get('/test-senangpay', 'HomeController@testSenangpay');

Route::get('/test-senangpay', function () {
    return view('testsenangpay');
});


Route::group(['namespace' => 'Cart'], function () {

    Route::get('/test/{product_id}/{price}/{minimum_order}', 'CartController@test')->name('/test');
//    Route::get('/cart-add-item/{user_id}/{product_id}/{price}/{minimum_order}', 'CartController@CartAddItems')->name('cart-add-item');
    Route::get('/cart-add-item/{user_id}/{product_id}/{price}/{minimum_order}/{quantity}/{product_type}', 'CartController@CartAddItems')->name('cart-add-item');
    Route::get('/cart-details', 'CartController@CartDetails')->name('/cart-details');
    Route::get('/cart-first-purchase', 'CartController@CartFirstPurchase')->name('/cart-first-purchase');
    Route::get('/cart-count', 'CartController@CartCount')->name('/cart-count');
    Route::get('{rowID}/remove-item', 'CartController@RemoveItem')->name('/remove-item');
});


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/list-order-hq', 'HomeController@listOrderHQ')->name('list.order.hq')->middleware('verified');
Route::get('/list-order-team', 'HomeController@listOrderTeam')->name('list.order.team')->middleware('verified');
Route::get('/list-deleted-order', 'HomeController@deletedOrder')->name('list.deleted.order')->middleware('verified');
Route::get('{orderId}/order-details', 'HomeController@orderDetails')->name('details.order')->middleware('verified');

Route::get('/list-product', 'HomeController@ListProducts')->name('list.product')->middleware('verified');
Route::get('/add-product', 'HomeController@AddProducts')->name('add.product')->middleware('verified');

Route::get('/edit-product/{product_id}', function ($product_id) {
    return view('pages.Admin.Products.EditProduct',['product_id' => $product_id]);
})->middleware('verified');

Route::get('/list-team', 'HomeController@ListTeam')->name('list.team')->middleware('verified');
Route::get('/genelogy', 'HomeController@Genelogy')->name('genelogy')->middleware('verified');
Route::get('/roles', 'HomeController@Roles')->name('roles')->middleware('verified');
Route::get('/new-application', 'HomeController@NewApplication')->name('new.application')->middleware('verified');
Route::get('/territory', 'HomeController@Territory')->name('territory')->middleware('verified');
Route::get('/states', 'HomeController@State')->name('states')->middleware('verified');
Route::get('/user-profile', 'HomeController@UserProfile')->name('user.profile')->middleware('verified');

Route::get('/classroom', 'HomeController@classroom')->name('classroom')->middleware('verified');

Route::get('/shipping', 'HomeController@shipping')->name('shipping')->middleware('verified');


Route::get('/agent-details/{agentID}', function ($agentID) {
    return view('pages.Admin.Teams.Team.details',['agentID' => $agentID]);
})->middleware('verified');


Route::get('/stock', 'HomeController@Stock')->name('stock')->middleware('verified');

Route::get('/list-customer-order', 'HomeController@ListCustomerOrder')->name('list.customer.order')->middleware('verified');
Route::get('/new-customer-order', 'HomeController@CustomerOrder')->name('new.customer.order')->middleware('verified');
Route::get('{orderId}/customer-order-details', 'HomeController@CustomerOrderDetails')->name('customer.details.order')->middleware('verified');

//Route::get('/agent-details/{agentID}/{userID}', function ($agentID,$userID) {
//    return view('pages.Admin.Teams.Team.details',['agentID' => $agentID, 'userID' => $userID]);
//})->middleware('verified');
