<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function(){
    Route::get('/staff-login',[AuthController::class,'index'])->name('staff.login')->middleware('SudahLogin');
    Route::post('/check',[AuthController::class,'check'])->name('auth.check');
    Route::get('/staff-logout',[AuthController::class,'logout'])->name('staff.logout')->middleware('admin');
    Route::get('/dashboard',[AdminController::class,'index'])->name('staff.dashboard')->middleware('admin');
});


