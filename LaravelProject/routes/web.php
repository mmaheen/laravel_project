<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CustomerController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[PageController::class,'home'])->name('home');

Route::get('/login',[PageController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'loginsubmit'])->name('login');

Route::get('/registration',[AdminController::class,'registration'])->name('registration');
Route::post('/register',[AdminController::class,'registersubmit'])->name('register.submit');

Route::post('/add/medicines',[MedicineController::class,'addmedicine'])->name('medicine.add')->middleware('authorized');
Route::get('/add/medicines',[MedicineController::class,'medicine'])->name('medicine.add')->middleware('authorized');

Route::get('/list/medicines',[MedicineController::class,'listmedicine'])->name('medicine.list')->middleware('authorized');

Route::get('/edit/medicines/{id}',[MedicineController::class,'editmedicine'])->name('medicine.edit')->middleware('authorized');
Route::post('/edit/medicines/{id}',[MedicineController::class,'updatemedicine'])->name('medicine.edit')->middleware('authorized');

Route::get('/details/medicine/{id}/{name}',[MedicineController::class, 'medicinedetails'])->name('medicine.details')->middleware('authorized');
Route::post('/details/medicine/{id}/{name}',[OrderController::class, 'ordermedicine'])->name('medicine.details')->middleware('authorized');

Route::get('/delete/medicines/{id}',[MedicineController::class,'delete'])->name('medicine.delete')->middleware('authorized');

Route::get('/admin/profile/{id}',[PageController::class,'adminprofile'])->name('admin.profile');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');

Route::get('/order/list',[OrderController::class,'orderlist'])->name('order.list')->middleware('authorized');
Route::get('/medicine/order/{id}',[PageController::class,'ordermedicine'])->name('order.medicine');

Route::get('customer/registration',[CustomerController::class,'registration'])->name('customer.registration');
Route::post('customer/registration',[CustomerController::class,'registersubmit'])->name('customer.registration');

//Route::get('/logout',[CustomerController::class,'logout'])->name('customer.logout');