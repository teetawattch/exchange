<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/savecurrency', [HomeController::class, 'saveCurrency'])->name('saveCurrency');

Route::prefix('wallet')->group(function(){
    Route::get('/', [WalletController::class, 'index']);
    Route::post('/addwallet', [WalletController::class, 'addWallet'])->name('addWallet');
    Route::get('/getwalletbyid/{id}', [WalletController::class, 'getWalletById'])->name('getWalletById');
    Route::post('/deposit', [WalletController::class, 'deposit'])->name('deposit');
});

Route::prefix('/market')->group(function (){
    Route::get('/', [MarketController::class, 'index']);
    Route::post('/addstore', [MarketController::class, 'addStore'])->name('addStore');
    Route::get('/getprice/{id}', [MarketController::class, 'getPrice'])->name('getPrice');
    Route::get('/getstore/{id}', [MarketController::class, 'getStore'])->name('getStore');
    Route::post('/addorder', [MarketController::class, 'addOrder'])->name('addOrder');
});

Route::prefix('/request')->group(function(){
    Route::get('/', [RequestController::class, 'index']);
    Route::post('/accept', [RequestController::class, 'acceptRequest'])->name('acceptRequest');
    Route::post('/deny', [RequestController::class, 'denyRequest'])->name('denyRequest');
});
