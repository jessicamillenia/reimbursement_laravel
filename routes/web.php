<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReimburseController;
use App\Http\Controllers\AccountController;

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

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login/check', [LoginController::class, 'authenticate'])->name('checkLogin');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('reimburse', ReimburseController::class);
    Route::post('reimburse/{id}/reject', [ReimburseController::class, 'reject'])->name('reimburse.reject');
    Route::post('reimburse/{id}/approve', [ReimburseController::class, 'approve'])->name('reimburse.approve');
    Route::resource('account', AccountController::class);
});
