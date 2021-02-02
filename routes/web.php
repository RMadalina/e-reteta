<?php

use Illuminate\Support\Facades\Route;

use App\Models;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\DeseaseController;


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
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'store']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:' . Models\Role::ADMIN_ROLE], function() {
        Route::resource('admin/hospitals',  App\Http\Controllers\Admin\HospitalController::class );
        Route::resource('admin/doctors', App\Http\Controllers\Admin\DoctorController::class );
        Route::resource('admin/pacients', App\Http\Controllers\Admin\PacientController::class );
        Route::resource('admin/medicines', App\Http\Controllers\Admin\MedicineController::class );
        Route::resource('admin/deseases', App\Http\Controllers\Admin\DeseaseController::class );

    });
    Route::group(['middleware' => 'role:' . Models\Role::DOCTOR_ROLE], function() {
        Route::resource('doctor/diagnoses',  App\Http\Controllers\Doctor\DiagnoseController::class );
        Route::resource('doctor/recipes', App\Http\Controllers\Doctor\RecipeController::class );
       

    });

    

});
