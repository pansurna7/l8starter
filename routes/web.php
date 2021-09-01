<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Livewire\Admin\ManagementSystem\Role\RoleComponent;
use App\Http\Livewire\Admin\ManagementSystem\DashboardComponent;
use App\Http\Livewire\Admin\ManagementSystem\Role\RoleDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Students;

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
});
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard',DashboardComponent::class)->name('staff.dashboard');
    Route::get('/role',RoleComponent::class)->name('admin.role');
    Route::get('/role-detail/{idr}',RoleDetail::class)->name('admin.role.detail');

});



