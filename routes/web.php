<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OfferController;
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


Route::get('/', [HomeController::class, 'index']);
     
Route::get('/aboutus', [AboutusController::class, 'index']);

Route::get('/contact', [ContactController::class, 'create']);

Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/offers', [OfferController::class, 'index']);