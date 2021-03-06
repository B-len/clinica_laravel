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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/panel', function () {
    return view('admin.panel');
})->name('admin-panel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/admin/clients',App\Http\Controllers\ClientController::class)->names('clients');

Route::resource('/admin/medical-sessions',App\Http\Controllers\MedicalSessionController::class)->names('medical-sessions');

Route::resource('/admin/reservations',App\Http\Controllers\ReservationController::class)->names('reservations');


Route::get('/admin/reservations/nextMonth/{date}',[App\Http\Controllers\ReservationController::class,'nextMonth'])->name('nextMonth');

Route::get('/admin/reservations/last/{date}',[App\Http\Controllers\ReservationController::class,'lastMonth'])->name('lastMonth');

