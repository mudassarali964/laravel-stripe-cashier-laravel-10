<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Default laravel page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function () {
    Route::get('stripe_plans', [StripeController::class, 'index'])->name('stripe_plans.index');
    Route::get('stripe_plans/{plan}', [StripeController::class, 'show'])->name("stripe_plans.show");
    Route::post('subscription', [StripeController::class, 'subscription'])->name("subscription.create");
});

// Admin Dashboard Route
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('plans', PlanController::class);
    Route::get('/', [AdminController::class, 'index'])->name('index');
});
