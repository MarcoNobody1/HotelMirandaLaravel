<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/aboutus', [AboutusController::class, 'index']);

Route::get('/contact', [ContactController::class, 'create']);

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/roomdetails/{id}', [RoomController::class, 'show']);

Route::post('/roomdetails/{id}', [BookingController::class, 'store']);

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/rooms-search', [RoomController::class, 'search']);

Route::get('/offers', [OfferController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::delete('/orders', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/editorder/{id}', [OrderController::class, 'edit'])->name('editorder');
    Route::patch('/editorder/{id}', [OrderController::class, 'update'])->name('editorder.update');
    Route::post('/roomservice', [OrderController::class, 'store'])->name('roomservice.create');
    Route::get('/roomservice', [OrderController::class, 'create'])->name('roomservice');
});

require __DIR__ . '/auth.php';
