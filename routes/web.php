<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;

Auth::routes(['register' => false]);

// Neutral Routes
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('beginners-guide', [WebController::class, 'beginners'])->name('beginners');
Route::get('opportunities', [WebController::class, 'opportunities'])->name('opportunities');
Route::get('our-products', [WebController::class, 'products'])->name('products');
Route::get('success/{token}', [WebController::class, 'success'])->name('success');

// Contact Route
Route::get('contact-us', [WebController::class, 'contact'])->name('contact');

// Registration Routes
Route::get('/site/{username}', [WebController::class, 'referral'])->name('referral');

Route::middleware('auth')->group(function() {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/edit-profile', App\Http\Livewire\Account\Profile::class)->name('profile');
	Route::get('/change-password', App\Http\Livewire\Account\Password::class)->name('password');
	Route::get('/products', App\Http\Livewire\Ecommerce\Product::class)->name('product');
	Route::get('/cart', App\Http\Livewire\Ecommerce\Cart::class)->name('cart');
	Route::get('/checkout', App\Http\Livewire\Ecommerce\Checkout::class)->name('checkout');
	Route::get('/orders', App\Http\Livewire\Order\History::class)->name('orders');
	Route::get('/order/{order_number}', App\Http\Livewire\Order\Single::class)->name('order.single');
	Route::get('/order/payment/{order_number}', App\Http\Livewire\Order\Payment::class)->name('order.payment');
	Route::get('/account/payment', App\Http\Livewire\Account\Payment::class)->name('account.payment');
	Route::get('/point_system', App\Http\Livewire\Point\Item::class)->name('points');
	Route::get('/points/history', App\Http\Livewire\Point\History::class)->name('point.history');
	Route::get('/transactions/cash-out', App\Http\Livewire\Transactions\Cash::class)->name('transaction.cash');
	Route::get('/transactions/history', App\Http\Livewire\Transactions\History::class)->name('transaction.history');
	Route::get('/invite-friends', App\Http\Livewire\Referral\Invite::class)->name('referral.invite');
	Route::get('/networks', App\Http\Livewire\Network\Index::class)->name('network.index');
});


