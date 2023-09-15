<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::middleware([
    'auth:sanctum',
    'web', // Updated: Replaced `config('jetstream.auth_session')` with `web`
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/add_doctor_view',[AdminController::class,'addview']);

Route::post('/upload_doctor',[AdminController::class,'upload']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/add_appointment',[HomeController::class,'add_appointment']);

Route::get('/Show_Appointments',[AdminController::class,'Show_Appointments']);

Route::get('/Aprove/{id}',[AdminController::class,'Aprove']);

Route::get('/cancel/{id}',[AdminController::class,'cancel']);

Route::get('/show_Doctors',[AdminController::class,'show_Doctors']);

Route::get('/delete/{id}',[AdminController::class,'delete']);

Route::get('/edit/{id}',[AdminController::class,'edit']);

Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);

Route::get('/send/{id}',[AdminController::class,'send']);

Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);



