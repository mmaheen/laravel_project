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

//Homepage
Route::get('/',[PageController::class,'home'])->name('home');

//Login
Route::get('/login',[PageController::class,'login'])->name('login');
Route::post('/login',[AdminController::class,'loginsubmit'])->name('login');

//Registration
Route::get('/registration',[AdminController::class,'registration'])->name('registration');
Route::post('/register',[AdminController::class,'registersubmit'])->name('register.submit');

Route::get('/customer/registration',[CustomerController::class,'registration'])->name('customer.registration');
Route::post('/customer/registration',[CustomerController::class,'registersubmit'])->name('customer.registration');

//Add medicine
Route::post('/add/medicines',[MedicineController::class,'addmedicine'])->name('medicine.add')->middleware('authorized');
Route::get('/add/medicines',[MedicineController::class,'medicine'])->name('medicine.add')->middleware('authorized');

//list Medicine
Route::get('/list/medicines',[MedicineController::class,'listmedicine'])->name('medicine.list')->middleware('authorized');

//Edit medicine
Route::get('/edit/medicines/{id}',[MedicineController::class,'editmedicine'])->name('medicine.edit')->middleware('authorized');
Route::post('/edit/medicines/{id}',[MedicineController::class,'updatemedicine'])->name('medicine.edit')->middleware('authorized');

//Route::get('/details/medicine/{id}/{name}',[MedicineController::class, 'medicinedetails'])->name('medicine.details')->middleware('authorized');
//Route::post('/details/medicine/{id}/{name}',[OrderController::class, 'cart'])->name('medicine.details')->middleware('authorized');

//Delete Medicine
Route::get('/delete/medicines/{id}',[MedicineController::class,'delete'])->name('medicine.delete')->middleware('authorized');

//Profile Admin
Route::get('/admin/profile/{id}',[PageController::class,'adminprofile'])->name('admin.profile');
//Logout
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');

//Order List (Admin Access)
Route::get('/order/list',[OrderController::class,'orderlist'])->name('order.list')->middleware('authorized');
//Route::get('/medicine/order/{id}',[PageController::class,'ordermedicine'])->name('order.medicine');

//Profile Customer
Route::get('/customer/profile',[CustomerController::class,'profile'])->name('customer.profile')->middleware('authorized');
//Route::get('/customer/cart',[OrderController::class,'cartlist'])->name('customer.cart')->middleware('authorized');

//Profile Update
Route::post('/customer/name/update',[CustomerController::class,'nameupdate'])->name('customer.name.update')->middleware('authorized');
Route::get('/customer/name/update',[CustomerController::class,'nameedit'])->name('customer.name.update')->middleware('authorized');

Route::post('/customer/password/update',[CustomerController::class,'passwordupdate'])->name('customer.password.update')->middleware('authorized');
Route::get('/customer/password/update',[CustomerController::class,'passwordedit'])->name('customer.password.update')->middleware('authorized');

Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile')->middleware('authorized');
Route::post('/admin/name/update',[AdminController::class,'nameupdate'])->name('admin.name.update')->middleware('authorized');
Route::get('/admin/name/update',[AdminController::class,'nameedit'])->name('admin.name.update')->middleware('authorized');

Route::post('/admin/password/update',[AdminController::class,'passwordupdate'])->name('admin.password.update')->middleware('authorized');
Route::get('/admin/password/update',[AdminController::class,'passwordedit'])->name('admin.password.update')->middleware('authorized');

Route::get('/admin/change/profilepicture',[AdminController::class,'pictureedit'])->name('admin.change.picture')->middleware('authorized');
Route::post('/admin/change/profilepicture',[AdminController::class,'pictureupdate'])->name('admin.change.picture')->middleware('authorized');

Route::get('/customer/change/profilepicture',[CustomerController::class,'pictureedit'])->name('customer.change.picture')->middleware('authorized');
Route::post('/customer/change/profilepicture',[CustomerController::class,'pictureupdate'])->name('customer.change.picture')->middleware('authorized');

//cart
Route::get('/medicine/addtocart/{id}',[MedicineController::class,'addtocart'])->name('medicine.addtocart')->middleware('authorized');
Route::get('/emptycart',[MedicineController::class,'emptycart'])->name('medicine.emptycart')->middleware('authorized');
Route::get('/cart',[MedicineController::class,'mycart'])->name('medicine.mycart')->middleware('authorized');

//checkout
Route::post('/checkout',[MedicineController::class,'checkout'])->name('checkout')->middleware('authorized');

//customer myorder
Route::get('/customer/myorder',[CustomerController::class,'myorders'])->name('customer.myorders')->middleware('authorized');
Route::get('/customer/myorder/details/{id}',[CustomerController::class,'orderdetails'])->name('customer.myorders.details')->middleware('authorized');