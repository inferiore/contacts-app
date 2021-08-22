<?php

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

Route::middleware(["auth"])->prefix("contacts")->group(function(){
    Route::get('/',[\App\Http\Controllers\ContactsController::class,"index"])->name("contact.list");
    Route::post('/import',[\App\Http\Controllers\ContactsController::class,"import"])->name("contact.import");
});


Route::get('login', ['\App\Http\Controllers\AuthController','showLogin'])->name("auth.showLogin");

Route::post('login', ['\App\Http\Controllers\AuthController','doLogin'])->name("login");
Route::get('logout', ['\App\Http\Controllers\AuthController','doLogout'])->name("auth.logout");

