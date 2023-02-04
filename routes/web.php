<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UpcmovieController;
use App\Http\Controllers\ReviewControlle;
use App\Http\Controllers\EmailController;

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
    return view("welcome");
})->name('welcome');

Route::get('about', function () {
    return view("layouts.about");
})->name('aboutus');

Route::get('contactus', function () {
    return view("layouts.contactus");
})->name('contactus');

Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'checkUserType']);

Route::get('user-profile', [App\Http\Controllers\MovieController::class, 'profile'])->name('user-profile');
Route::get('user/dashboard', [App\Http\Controllers\MovieController::class, 'showmovie'])->name('user.dashboard');
Route::get('movieview/{mname}', [App\Http\Controllers\MovieController::class, 'movieview']);
Route::get('watchtrailer/{mname}', [App\Http\Controllers\MovieController::class, 'trailer']);

Route::get('moviedate', [App\Http\Controllers\MovieController::class, 'adddate'])->name('moviedate');
Route::post('insert-moviedate', [App\Http\Controllers\MovieController::class, 'insertdate']);
Route::get('movieshedule', [App\Http\Controllers\MovieController::class, 'moviedateview'])->name('movieshedule');
Route::post('deletedate', [App\Http\Controllers\MovieController::class, 'deletemoviedate'])->name('deletedate');
Route::get('view-movie/{mname}', [App\Http\Controllers\MovieController::class, 'dateview']);

Route::get('book-ticket/{id}', [App\Http\Controllers\TicketController::class, 'bookingdeatials']);
Route::post('place-booking',[App\Http\Controllers\TicketController::class, 'placeorder']);
Route::get('upadd', [App\Http\Controllers\UpcmovieController::class, 'upmadd'])->name('upadd');
Route::get('upmovie', [App\Http\Controllers\UpcmovieController::class, 'upview'])->name('upmovie');
Route::post('upmovie-insert', [App\Http\Controllers\UpcmovieController::class, 'upminsert']);
Route::post('updelete', [App\Http\Controllers\UpcmovieController::class, 'updelete'])->name('updelete');

Route::get('add-review/{mname}/userreview', [App\Http\Controllers\ReviewController::class, 'add']);
Route::post('add-review', [App\Http\Controllers\ReviewController::class, 'create']);
Route::get('edit-review/{mname}/userreview', [App\Http\Controllers\ReviewController::class, 'edit']);
Route::put('update-review', [App\Http\Controllers\ReviewController::class, 'update']);

Route::get ('my-booking', [App\Http\Controllers\TicketController::class, 'mybooking'])->name('my-booking');
Route::get('view-booking/{id}', [App\Http\Controllers\TicketController::class, 'viewbooking']);
Route::get('moviebooking', [App\Http\Controllers\TicketController::class, 'bookingdetails'])->name('moviebooking');
Route::get('adminview-booking/{id}', [App\Http\Controllers\TicketController::class, 'updatebooking']);
Route::put('update-booking/{id}', [App\Http\Controllers\TicketController::class, 'updatestatus']);
Route::get('booking-hisorty', [App\Http\Controllers\TicketController::class, 'bookinghistory']);

Route::get('export-bookinghistory-pdf', [App\Http\Controllers\TicketController::class, 'bhexportpdf'])->name('export-bhistory-pdf');
Route::get('export-mdate-pdf', [App\Http\Controllers\MovieController::class, 'mdexportpdf'])->name('export-mdate-pdf');
Route::get('export-movie-pdf', [App\Http\Controllers\MovieController::class, 'mexportpdf'])->name('export-movie-pdf');
Route::get('ep-product-pdf', [App\Http\Controllers\ProductController::class, 'pexportpdf'])->name('ep-product-pdf');
Route::get('payment-reciept-pdf/{id}', [App\Http\Controllers\TicketController::class, 'prexportpdf'])->name('payment-invoice-pdf');
Route::post('pay-with-razorpay', [App\Http\Controllers\TicketController::class, 'paymentdone']);
Route::post('sendmail', [App\Http\Controllers\EmailController::class, 'sendmail']);

Route::get('reciept-orders-pdf/{id}', [App\Http\Controllers\OrderController::class, 'orexportpdf'])->name('order-invoice-pdf');

Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin.dashboard');

Route::get('send-sms', [App\Http\Controllers\SmsController::class, 'sendsms'])->name('sms');
/* Route::get('admin/dashboard', function(){
    return view("admindashboard");
})->name('admin.dashboard'); */

/* Route::get('user/dashboard', function(){
    return view("userdashboard");
})->name('user.dashboard');  */

Route::get('/index', [App\Http\Controllers\AdminController::class, 'index'])->name('index');

Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');

Route::put('update-data/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update');

Route::post('delete', [App\Http\Controllers\AdminController::class, 'removeuser']);

Route::get('add', [App\Http\Controllers\AdminController::class, 'add'])->name('add');

Route::post('insert-data', [App\Http\Controllers\AdminController::class, 'insert']);

Route::get('profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');

//Route::put('profile/{id}', [App\Http\Controllers\AdminController::class, 'update_avatar']);

Route::get('addproduct', [App\Http\Controllers\AdminController::class, 'addproduct'])->name('addproduct');

Route::get('catagory', [App\Http\Controllers\CatagoryController::class, 'index'])->name('catagory');
Route::get('add-catagory', [App\Http\Controllers\CatagoryController::class, 'addcatagory'])->name('addcatagory');
Route::post('insert-catagory', [App\Http\Controllers\CatagoryController::class, 'insert']);
Route::get('editprod/{id}', [App\Http\Controllers\CatagoryController::class, 'editprod']);
Route::put('update-catagory/{id}', [App\Http\Controllers\CatagoryController::class, 'update']);
//Route::get('delete-catagory/{id}', [App\Http\Controllers\CatagoryController::class, 'delete']);
Route::post('delete-catagory', [App\Http\Controllers\CatagoryController::class, 'delete']);


Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('add-product', [App\Http\Controllers\ProductController::class, 'add'])->name('addproduct');
Route::post('insert-product', [App\Http\Controllers\ProductController::class, 'insert']);
Route::get('edit-prod/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('update-product/{id}', [App\Http\Controllers\ProductController::class, 'update']);
//Route::get('delete-prod/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
Route::post('delete-prod', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete-prod');


Route::get('merchandise', [App\Http\Controllers\UserController::class, 'index'])->name('merchandise');
Route::get('category', [App\Http\Controllers\UserController::class, 'category'])->name('category');
Route::get('category/{slug}', [App\Http\Controllers\UserController::class, 'viewcategory']);
Route::get('category/{cata_slug}/{prod_slug}', [App\Http\Controllers\UserController::class, 'productview']);


Route::post('add-to-cart', [App\Http\Controllers\CartController::class, 'addtocart']);
Route::get('cart', [App\Http\Controllers\CartController::class, 'viewcart'])->name('cart');
Route::post('delete-cart-item', [App\Http\Controllers\CartController::class, 'deleteitem']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updatecart']);
Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'index']);
Route::post('place-order', [App\Http\Controllers\CheckoutController::class, 'placeorder']);

Route::get('my-orders', [App\Http\Controllers\UserController::class, 'myorder'])->name('my-orders');
Route::get('view-order/{id}', [App\Http\Controllers\UserController::class, 'view']);

Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
Route::get('vieworder/{id}', [App\Http\Controllers\OrderController::class, 'view']);
Route::put('update-order/{id}', [App\Http\Controllers\OrderController::class, 'update']);
Route::get('order-history', [App\Http\Controllers\OrderController::class, 'orderhistory']);

Route::get('wishlist', [App\Http\Controllers\WishlistController::class, 'view'])->name('wishlist');
Route::post('add-to-wishlist', [App\Http\Controllers\WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [App\Http\Controllers\WishlistController::class, 'deleteitem']);

Route::post('proceed-to-pay', [App\Http\Controllers\CheckoutController::class, 'razorpaycheck']);

Route::get('movie', [App\Http\Controllers\MovieController::class, 'index'])->name('movie');
Route::get('addmovie', [App\Http\Controllers\MovieController::class, 'add'])->name('addmovie');
Route::post('insert-movie', [App\Http\Controllers\MovieController::class, 'insert']);
Route::get('edit-movie/{id}', [App\Http\Controllers\MovieController::class, 'editmovie']);
Route::put('update-movie/{id}', [App\Http\Controllers\MovieController::class, 'updatemovie']);
//Route::get('delete-movie/{id}', [App\Http\Controllers\MovieController::class, 'deletemovie']);
Route::post('delete-movie', [App\Http\Controllers\MovieController::class, 'deletemovie']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
