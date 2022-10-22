<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
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


// login page
Route::get('/', function () {
    return view('login.login');
})->middleware('guest');
Route::post('/login', [AdminController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [AdminController::class, 'logout'])->middleware('guest');
Route::get('/regis', [AdminController::class, 'pendaftaranBaru'])->middleware('guest');
Route::post('/regis', [AdminController::class, 'simpanPendaftaranBaru'])->middleware('guest');


// main course
Route::get('/perdin', [PermissionController::class, 'index'])->middleware('isAdmin');
Route::get('/perdin-create', [PermissionController::class, 'create'])->middleware('isAdmin');
Route::get('/perdin-show/{permission:id}', [PermissionController::class, 'show'])->middleware('isAdmin');
Route::post('/perdin-store', [PermissionController::class, 'store'])->middleware('isAdmin');
Route::get('/perdin-update/{permission:id}', [PermissionController::class, 'updateView'])->middleware('isAdmin');
Route::post('/perdin-update/{permission:id}', [PermissionController::class, 'updateStore'])->middleware('isAdmin');
Route::get('/perdin-delete/{permission:id}', [PermissionController::class, 'destroy'])->middleware('isAdmin');
