<?php

use App\Http\Controllers\admin\itemController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>'admin'], function () {
    Route::get("item",[itemController::class,'indexItem'])->name('admin.item.item');
    Route::get("add_item",[itemController::class,'addItem'])->name('admin.item.add_item');
    Route::post("item-save",[itemController::class,'saveItem'])->name('admin.item.item-save');

    Route::get("product",[itemController::class,'product'])->name('admin.item.product');
    Route::get("item-dimension",[itemController::class,'dimension'])->name('admin.item.item-dimension');
    Route::get("item-thickness",[itemController::class,'thickness'])->name('admin.item.item-thickness');
    Route::get("item-company",[itemController::class,'company'])->name('admin.item.item-company');

    Route::get("add_dimension",[itemController::class,'addDimension'])->name('admin.item.add_dimension');
    Route::post("dimension-save",[itemController::class,'saveDimension'])->name('admin.item.dimension-save');


    Route::get("add-thickness",[itemController::class,'addThickness'])->name('admin.item.add-thickness');
    Route::post("thickness-save",[itemController::class,'saveThickness'])->name('admin.item.thickness-save');

    Route::get("add-company",[itemController::class,'addCompany'])->name('admin.item.add-company');
    Route::post("company-save",[itemController::class,'saveCompany'])->name('admin.item.company-save');



});
