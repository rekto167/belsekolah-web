<?php

use App\Http\Controllers\MainController;
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
Route::get('/', [MainController::class, 'home'])->name('home');
Route::prefix('/hari')->group(function(){
    Route::get('/', [MainController::class, 'hari'])->name('hari');
});
Route::prefix('/aktifitas')->group(function()
{
    Route::get('/', [MainController::class, 'aktifitas'])->name('aktifitas');
});
Route::get('/bell', [MainController::class, 'bell'])->name('bell');
Route::get('/jadwal', [MainController::class, 'jadwal'])->name('jadwal');