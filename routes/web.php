<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'getMovie']);
Route::get('/film', [App\Http\Controllers\HomeController::class, 'getMovie']);
Route::get('/film/{id}', [App\Http\Controllers\HomeController::class, 'getDetailMovie']);
Route::get('/film/add/form', [App\Http\Controllers\HomeController::class, 'addMovieForm']);
//Route::get('/film/add', [App\Http\Controllers\HomeController::class, 'addMovie']);
Route::get('/tambah', [App\Http\Controllers\HomeController::class, 'addMovie']);
Route::get('/film/update/form/{id}', [App\Http\Controllers\HomeController::class, 'updateMovieForm']);
Route::get('/film/update/{id}', [App\Http\Controllers\HomeController::class, 'updateMovie']);
Route::get('/film/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteMovie']);
Route::get('/film/jadwal/add/{id}', [App\Http\Controllers\HomeController::class, 'addJadwal']);
Route::get('/customer', [App\Http\Controllers\HomeController::class, 'getCustomer']);
Route::get('/customer/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteCustomer']);
Route::get('/jadwal', [App\Http\Controllers\HomeController::class, 'getAllJadwal']);
Route::get('/jadwal/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteJadwal']);
Route::get('/transaction', [App\Http\Controllers\HomeController::class, 'getTransaction']);
