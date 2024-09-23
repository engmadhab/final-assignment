<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\Admin\addNewAdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\carSearchController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\PageController;

// ------------------- frontend routes --------------------------------------- //

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/cars', [App\Http\Controllers\Frontend\CarController::class, 'index'])->name('cars');
Route::get('/cars/search', [carSearchController::class, 'search'])->name('carSearch');

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');

Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::redirect('/admin', 'admin/login');

// ------------------- admin routes --------------------------------------- //

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard',DashboardController::class)->name('Dashboard');
    Route::get('/addAdmin', [usersController::class, 'create'])->name('addAdmin');
    Route::post('/addAdmin', [addNewAdminController::class, 'register'])->name('addNewAdmin');
    
    Route::get('/users',[UsersController::class, 'index'])->name('users');

    // Customer Route
    Route::get('/addCustomer', [CustomerController::class, 'create_customer'])->name('addCustomer');
    Route::post('/addCustomer', [CustomerController::class, 'register_customer'])->name('addNewCustomer'); 
    Route::get('/userDetails/{user}', [CustomerController::class, 'show'])->name('userDetails');
    Route::get('/editCustomer/{user}', [CustomerController::class, 'edit_customer'])->name('editCustomer');
    Route::put('/updateCustomer/{user}', [CustomerController::class, 'update'])->name('updateCustomer');
    Route::delete('/deleteUser/{user}', [CustomerController::class, 'destroy'])->name('deleteUser');

    Route::resource('cars', CarController::class);

    // Rental Route Admin
    Route::get('/updatePayment/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'editPayment'])->name('editPayment');
    Route::put('/updatePayment/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'updatePayment'])->name('updatePayment');
    Route::get('/updateReservation/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'editStatus'])->name('editStatus');
    Route::put('/updateReservation/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'updateStatus'])->name('updateStatus');
});


// ------------------- Rentals routes frontendt --------------------------------------- //

Route::get('/reservations/{car}', [RentalController::class, 'create'])->name('car.reservation')->middleware('auth', 'restrictAdminAccess');
Route::post('/reservations/{car}', [RentalController::class, 'store'])->name('car.reservationStore')->middleware('auth', 'restrictAdminAccess');
Route::get('/reservations', [RentalController::class, 'rentals'])->name('clientReservation')->middleware('auth', 'restrictAdminAccess');
route::get('invoice/{reservation}', [invoiceController::class, 'invoice'])->name('invoice')->middleware('auth', 'restrictAdminAccess');

//---------------------------------------------------------------------------//

Auth::routes();
