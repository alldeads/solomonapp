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

Auth::routes(['register' => false]);

Route::get('/site/{username}', [App\Http\Controllers\WebController::class, 'referral']);
Route::post('/site/{username}', [App\Http\Controllers\WebController::class, 'referral'])->name('referral');

Route::get('/', function () {
    return view('index');
});

Route::get('/contact-us', App\Http\Livewire\Contact::class)->name('contact');
Route::post('/contact-us', [App\Http\Controllers\WebController::class, 'saveReport'])->name('home');
Route::get('/success/{token}', [App\Http\Controllers\WebController::class, 'success'])->name('success');

Route::middleware('auth')->group(function() {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/edit-profile', App\Http\Livewire\Account\Profile::class)->name('profile');
	Route::get('/products', App\Http\Livewire\Ecommerce\Product::class)->name('product');
	Route::get('/carts', App\Http\Livewire\Ecommerce\Cart::class)->name('cart');
	Route::get('/checkout', App\Http\Livewire\Ecommerce\Checkout::class)->name('checkout');
});


