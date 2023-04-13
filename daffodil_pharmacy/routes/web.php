<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/',[HomeController::class,'Home']);

Route::get('/category',[HomeController::class,'Category']);
Route::get('/medicine/{id}',[HomeController::class,'MedicineDetails'])->name('medicine.details');

Route::post('/MedicineDetails1',[HomeController::class,'MedicineDetails1']);

Route::post('/add-to-cart',[HomeController::class,'AddToCart']);


//Auth::routes();
//
//Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
//Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');
//
//Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
//Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin/dashboard',function(){
//    return view('admin');
//})->middleware('auth:admin');
