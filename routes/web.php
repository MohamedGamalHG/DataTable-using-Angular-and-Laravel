<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
Route::get('categories/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
Route::post('categories/update',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
Route::get('categories/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');


Route::get('products',[App\Http\Controllers\ProductController::class,'index'])->name('product.index');
Route::get('products/data',[App\Http\Controllers\ProductController::class,'getData'])->name('product.getdata');




Route::get('ajax-crud-datatable', [CompanyController::class, 'index']);
Route::post('store-company', [CompanyController::class, 'store']);
Route::post('edit-company', [CompanyController::class, 'edit']);
Route::post('delete-company', [CompanyController::class, 'destroy']);
