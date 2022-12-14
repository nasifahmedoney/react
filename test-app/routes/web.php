<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;

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

Route::get('/contact',[ContactController::class,'index'])->middleware('checkValue');
// category controller
Route::get('/category/all',[CategoryController::class,'showAllCategories'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'addCategory'])->name('add.category');
Route::get('/category/edit/{id}',[CategoryController::class,'editCategories']);
Route::post('/category/edit/{id}',[CategoryController::class,'updateCategories']);
Route::get('/softdelete/{id}',[CategoryController::class,'softdelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'restore']);
Route::get('/category/pdelete/{id}',[CategoryController::class,'permanentDelete']);
// brand controller
Route::get('/brand/all/',[BrandController::class,'allBrands'])->name('all.brand');
Route::post('/brand/add/',[BrandController::class,'storeBrands'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'editBrands']);
Route::post('/brand/edit/{id}',[BrandController::class,'updateBrands']);
Route::get('/brand/delete/{id}',[BrandController::class,'deleteBrand']);

//multiple pic upload
Route::get('/multipic/store',[BrandController::class,'multipic'])->name('all.multipic');
Route::post('/multipic/store',[BrandController::class,'multipicUpload']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',[
        'users'=> $users
    ]);
})->name('dashboard');

