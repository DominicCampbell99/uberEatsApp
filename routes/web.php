<?php

use Illuminate\Support\Facades\Route;
use App\Models\Restaurant;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Models\Dish;
use App\Models\Purchase;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrdersController;
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
    return view('home');
});

Route::get('/test', function () {
    
    dd($order);
});

///Checks if a user is a authorized and if not returns them to login page
Route::group(['middleware' => 'auth'], function() {
    Route::post('storePhoto/{dish}', [CustomerController::class, 'storePhoto']);
    Route::get('createPhoto/{dish}', [CustomerController::class, 'createPhoto']);
    ///Routes for users that are restaurants
    Route::group(['middleware' => 'checkRole:restaurant'], function() {
        
        Route::resource('restaurant', RestaurantController::class);
        Route::get('restaurantHome', [RestaurantController::class, 'index'])->name('restaurantHome');
        Route::get('orders', [RestaurantController::class, 'showOrders']);
        Route::get('promotion/{dish}', [RestaurantController::class, 'promotion']);
        Route::post('addPromotion/{dish}', [RestaurantController::class, 'addPromotion']);
    });
    
    Route::group(['middleware' => 'checkRole:customer'], function() {
        Route::post('purchase/{dish}', [CustomerController::class, 'store']);
        Route::get('purchase/accept/{dish}', [CustomerController::class, 'accept']);
        
        Route::get('cart', [CustomerController::class, 'cart']);
        Route::get('addToCart/{dish}/{restaurant}', [CustomerController::class, 'addToCart']);
        Route::get('order', [CustomerController::class, 'order']);
        Route::get('remove/{id}', [CustomerController::class, 'remove']);
        Route::get('addFav/{id}', [CustomerController::class, 'addFav']);
        Route::get('showFav/', [CustomerController::class, 'showFav']);
        
      
    });
});


Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
Route::resource('restaurants', GuestController::class);
Route::get('top5', [GuestController::class, 'top5']);



require __DIR__.'/auth.php';
