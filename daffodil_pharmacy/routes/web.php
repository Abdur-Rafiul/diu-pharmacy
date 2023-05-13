<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\PharmacyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();

Route::get('/',[HomeController::class,'Home'])->name('home.index');;

Route::get('/category1',[HomeController::class,'Category']);
Route::get('/medicine/{id}',[HomeController::class,'MedicineDetails'])->name('medicine.details');

Route::post('/MedicineDetails1',[HomeController::class,'MedicineDetails1']);

Route::post('/add-to-cart',[HomeController::class,'AddToCart']);
Route::post('/add-to-order',[HomeController::class,'AddToOrder']);

Route::get('/AllMedicine',[HomeController::class,'AllMedicine'])->name('all.medicine');
Route::get('/AllDoctor',[HomeController::class,'DoctorList'])->name('doctor.list');
Route::get('/category/{id}',[HomeController::class,'CategoryMedicine']);
Route::post('/search', [HomeController::class, 'MedicineSearch'])->name('medicine.search');


Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin/dashboard',function(){
//    return view('admin');
//})->middleware('auth:admin');

Route::post('/payment',[paymentController::class,'index'])->name('payment');
Route::post('/success',[paymentController::class,'success'])->name('success');
Route::post('/fail',[paymentController::class,'fail'])->name('fail');


//Admin Panel
Route::get('/admin/dashboard', [IndexController::class, 'Index'])->name('admin.dashboard');
Route::resource('medicine', MedicineController::class);
Route::resource('category', CategoryController::class);
Route::resource('pharmacy', PharmacyController::class);
Route::resource('doctor', DoctorController::class);
Route::resource('order', OrderController::class);
Route::get('user/list', [IndexController::class, 'user'])->name('user.list');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
