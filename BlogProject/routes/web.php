<?php

use App\Http\Controllers\HomeController;
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
Route::match(['post','get'],'/login',[HomeController::class,'login'])->name('login');
Route::match(['post','get'],'/',[HomeController::class,'home'])->name('home')->middleware('auth');
Route::match(['post','get'],'/signup',[HomeController::class,'signup'])->name('signup');
Route::match(['post','get'],'/logout',[HomeController::class,'logout'])->name('logout');
Route::match(['post','get'],'/profile',[HomeController::class,'profile'])->name('profile')->middleware('auth');
Route::match(['post','get'],'/edit-profile',[HomeController::class,'editprofile'])->name('editprofile')->middleware('auth');
Route::post('/password-change',[HomeController::class,'password'])->name('password')->middleware('auth');