<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAPIController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\Mailcontroller;
use App\Http\Controllers\OrderAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/registration',[AdminAPIController::class,'registration']);
Route::get('/admin/list',[AdminAPIController::class,'list']);
Route::post('/admin/login',[AdminAPIController::class,'login']);
Route::post('/admin/name/update/{username}/{password}',[AdminAPIController::class,'nameupdate']);
Route::post('/admin/password/update/{username}/{password}',[AdminAPIController::class,'passwordupdate']);

Route::get('/medicine/list',[ProductAPIController::class,'list']);
Route::post('/medicine/add',[ProductAPIController::class,'add']);
Route::post('/medicine/edit/{id}',[ProductAPIController::class,'edit']);
Route::get('/medicine/delete/{id}',[ProductAPIController::class,'delete']);
Route::get('/medicine/addtocart/{id}',[ProductAPIController::class,'addtocart']);

Route::get('/mail',[Mailcontroller::class,'mail']);
//order
Route::get('/order/list',[OrderAPIController::class,'list']);
Route::get('/orderdetails/list',[OrderAPIController::class,'listdetails']);
