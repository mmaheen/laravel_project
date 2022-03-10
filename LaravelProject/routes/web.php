<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;

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
Route::post('/login',[PageController::class,'loginsubmit'])->name('login');

Route::get('/registration',[PageController::class,'registration'])->name('registration');
Route::post('/register',[PageController::class,'registersubmit'])->name('register.submit');

Route::post('/add/medicines',[MedicineController::class,'addmedicine'])->name('medicine.add')->middleware('authorized');
Route::get('/add/medicines',[MedicineController::class,'medicine'])->name('medicine.add')->middleware('authorized');

Route::get('/list/medicines',[MedicineController::class,'listmedicine'])->name('medicine.list')->middleware('authorized');

Route::get('/edit/medicines/{id}',[MedicineController::class,'editmedicine'])->name('medicine.edit')->middleware('authorized');
Route::post('/edit/medicines/{id}',[MedicineController::class,'updatemedicine'])->name('medicine.edit')->middleware('authorized');

Route::get('/details/medicine/{id}/{name}',[MedicineController::class, 'medicinedetails'])->name('medicine.details');
Route::post('/details/medicine/{id}/{name}',[PageController::class, 'ordermedicine'])->name('medicine.details');

Route::get('/delete/medicines/{id}',[MedicineController::class,'delete'])->name('medicine.delete')->middleware('authorized');

Route::get('/admin/profile/{id}',[PageController::class,'adminprofile'])->name('admin.profile');
Route::get('/logout',[PageController::class,'logout'])->name('admin.logout');

Route::get('/order/list',[PageController::class,'orderlist'])->name('order.list')->middleware('authorized');
Route::get('/medicine/order/{id}',[PageController::class,'ordermedicine'])->name('order.medicine');