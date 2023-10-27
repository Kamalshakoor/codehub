<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Seller\HomeController as SellerHomeController;
use App\Http\Controllers\Buyer\Auth\LoginController as BuyerLoginController;
use App\Http\Controllers\Buyer\HomeController as BuyerHomeController;
use App\Http\Controllers\Seller\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Buyer\Auth\RegisterController as BuyerRegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomprojectController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Seller\PostController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WelcomeController;
use App\Models\Customproject;

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

Route::get('/', [WelcomeController::class,'index'])->name('welcome');
Route::get('projects/category/{category}',[WelcomeController::class,'category'])->name('projects.category');
Route::get('projects/subcategory/{subcategory}',[WelcomeController::class,'subcategory'])->name('projects.subcategory');
Route::post('admin/complaints/store',[ComplaintController::class,'store'])->name('complaints.store');
Route::post('admin/customprojects/store',[CustomprojectController::class,'store'])->name('customprojects.store');
Route::post('subscribers',[SubscriberController::class,'store'])->name('subscribers.store');
Route::get('/search-results', [WelcomeController::class,'searchResults'])->name('search-results');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Section
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/login',[AdminLoginController::class,'showLoginForm'])->name('login');
        Route::post('/login',[AdminLoginController::class,'login'])->name('login.submit');
    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::get('/home',[AdminHomeController::class,'index'])->name('home');
        Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');

        // sellers
        Route::get('sellers',[AdminController::class,'index'])->name('sellers.index');
        Route::delete('sellers/delete/{seller}',[AdminController::class,'delete'])->name('sellers.delete');

        // projects
        Route::get('projects',[AdminController::class,'projects'])->name('projects');
        Route::put('projects/{post}',[AdminController::class,'approveProject'])->name('approve-project');
        Route::get('show-project/{post}',[AdminController::class,'show'])->name('show-project');
        Route::get('project/{post}',[AdminController::class,'destroy'])->name('destroy-project');

        // orders
        Route::get('orders',[OrderController::class,'index'])->name('orders');
        Route::get('balance',[OrderController::class,'balance'])->name('balance');

        // Subscribers
        Route::get('subscribers',[SubscriberController::class,'index'])->name('subscribers');
        Route::delete('subscribers/{subscriber}',[SubscriberController::class,'destroy'])->name('subscriber.destroy');

        // Complaints
        Route::get('complaints',[ComplaintController::class,'index'])->name('complaints');
        Route::get('complaints/{complaint}',[ComplaintController::class,'show'])->name('complaint-detail');

        // Custom Projects
        Route::get('customprojects',[CustomprojectController::class,'index'])->name('customprojects');
        Route::get('customprojects/{complaint}',[CustomprojectController::class,'show'])->name('customproject-detail');
    });
});

// Seller Section
Route::prefix('seller')->name('seller.')->group(function(){
    Route::middleware(['guest:seller'])->group(function(){
        Route::get('/login',[SellerLoginController::class,'showLoginForm'])->name('login');
        Route::post('/login',[SellerLoginController::class,'login'])->name('login.submit');
        Route::get('/register',[SellerRegisterController::class,'showRegistrationForm'])->name('register');
        Route::post('/register',[SellerRegisterController::class,'register'])->name('register.submit');
    });
    Route::middleware(['auth:seller'])->group(function(){
        Route::get('/home',[SellerHomeController::class,'index'])->name('home');
        Route::post('/logout',[SellerLoginController::class,'logout'])->name('logout');

        // posts
        Route::resource('posts', PostController::class);

        // selled projects (sales)
        Route::get('sales',[SellerController::class,'index'])->name('sales.index');

        // balance
        Route::get('balance',[SellerController::class,'balance'])->name('balance');
        Route::put('withdraw',[SellerController::class,'balanceWithdraw'])->name('balance.withdraw');
        Route::put('account-detail/{seller}',[SellerController::class,'accountDetail'])->name('account-detail');
    });
});

// Buyer Section
Route::prefix('buyer')->name('buyer.')->group(function(){
    Route::middleware(['guest:buyer'])->group(function(){
        Route::get('/login',[BuyerLoginController::class,'showLoginForm'])->name('login');
        Route::post('/login',[BuyerLoginController::class,'login'])->name('login.submit');
        Route::get('/register',[BuyerRegisterController::class,'showRegistrationForm'])->name('register');
        Route::post('/register',[BuyerRegisterController::class,'register'])->name('register.submit');
    });
    Route::middleware(['auth:buyer'])->group(function(){
        Route::get('/home',[BuyerHomeController::class,'index'])->name('home');
        Route::post('/logout',[BuyerLoginController::class,'logout'])->name('logout');

        // view detail
        Route::get('projects/single-page/{post}',[WelcomeController::class,'singlePost'])->name('single.post');

        // add to cart
        Route::post('project/cart/add',[ShoppingController::class,'add_to_cart'])->name('cart.add');
        Route::get('project/cart',[ShoppingController::class,'cart'])->name('cart');
        Route::get('project/cart/delete/{id}',[ShoppingController::class,'cart_delete'])->name('cart.delete');

        Route::get('cart/checkout',[CheckoutController::class,'index'])->name('cart.checkout');

        Route::post('checkout',[CustomerController::class,'store'])->name('checkout');

        // Payment method
        Route::get('payment/checkout',[CheckoutController::class,'checkout'])->name('payment.checkout');
        Route::post('payment/checkout/complete',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');

        // add rating
        Route::post('add-rating',[RatingController::class,'add'])->name('add-rating');
    });
});
