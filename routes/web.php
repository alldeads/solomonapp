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

Route::get('/site/{username}', [App\Http\Controllers\WebController::class, 'referral']);

Route::get('/', function () {
    return view('index');
});

Route::get('/contact-us', App\Http\Livewire\Contact::class)->name('contact');
Route::post('/contact-us', [App\Http\Controllers\WebController::class, 'saveReport'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
