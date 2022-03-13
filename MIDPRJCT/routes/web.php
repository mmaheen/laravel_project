<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagescontroller;
use App\Http\Controllers\customerdash;
use App\Http\Controllers\admindash;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;

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

Route::get('/admin/registration',[admindash::class,'registration'])->name('registration');

Route::post('/admin/registration',[admindash::class,'registersubmit'])->name('register.submit');

Route::get('/login',[PagesController::class,'login'])->name('login');
Route::post('/login',[PagesController::class,'loginsubmit'])->name('login');
Route::get('/logout',[PagesController::class,'logout'])->name('logout');
Route::get('/Changepass',[PagesController::class,'Changepass'])->name('Changepass');
Route::post('/Changepassw',[PagesController::class,'Changepassubmit'])->name('Changepassword');

Route::get('/admin/home',[admindash::class,'adminhome'])->name('admin.home');
Route::get('/admin/cupon',[admindash::class,'managecupon'])->name('cupon');
Route::post('/admin/cupon',[admindash::class,'cuponsubmit'])->name('cupon');
Route::get('/admin/cuponslist',[admindash::class,'managecuponlist'])->name('cuponslist');
Route::get('/admin/deletecupon/{id}',[admindash::class,'deletecupon'])->name('cupon.delete');
Route::get('/admin/slide',[admindash::class,'slide'])->name('admin.slide');
Route::post('/admin/slide',[admindash::class,'slideup'])->name('admin.slide');
Route::get('/admin/slidelist',[admindash::class,'slidelist'])->name('admin.slidelist');
Route::get('/admin/deleteslide/{id}',[admindash::class,'deleteslide'])->name('slide.delete');

Route::post('/admin/addmedicine',[MedicineController::class,'addmedicine'])->name('addmedicine');
Route::get('/admin/addmedicine',[MedicineController::class,'medicine'])->name('addmedicine');

Route::get('/admin/medicinelist',[MedicineController::class,'listmedicine'])->name('medicinelist');
Route::get('/admin/medicinesdel/{id}',[MedicineController::class,'delete'])->name('medicinedelete');

Route::get('/admin/medicinesedit/{id}',[MedicineController::class,'editmedicine'])->name('medicine.edit');
Route::post('/admin/medicinesedit/{id}',[MedicineController::class,'updatemedicine'])->name('medicine.edit');


Route::get('/customer/home',[customerdash::class,'customerhome'])->name('customer.home');

Route::get('/customer/medicinedetails/{id}/{name}',[MedicineController::class, 'medicinedetails'])->name('medicinedetails');
Route::post('/customer/medicinedetails/{id}/{name}',[OrderController::class, 'ordermedicine'])->name('medicinedetails');

Route::get('/admin/orderlist',[OrderController::class,'orderlist'])->name('order.list');

