<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\addNewAdminController;
use App\Http\Controllers\addNewCustomerController;
use App\Http\Controllers\Admin\addNewCustomerController as AdminAddNewCustomerController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\carSearchController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;
use Dompdf\FrameDecorator\Page;

// ------------------- guest routes --------------------------------------- //
Route::get('/', function () {
    $cars = Car::take(6)->where('availability', '=', 'available')->get();
    return view('home', compact('cars'));
})->name('home');

Route::get('/cars', [App\Http\Controllers\Frontend\CarController::class, 'index'])->name('cars');
Route::get('/cars/search', [carSearchController::class, 'search'])->name('carSearch');

Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('contact', [PageController::class, 'contact'])->name('contact');


Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::redirect('/admin', 'admin/login');

// ------------------- admin routes --------------------------------------- //

Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/dashboard',adminDashboardController::class)->name('adminDashboard');
    Route::resource('cars', CarController::class);

    Route::get('/users', function () {
        $admins = User::where('role', 'admin')->get();
        $clients = User::where('role', 'customer')->paginate(5);
        return view('admin.users', compact('admins', 'clients'));
    })->name('users');

    Route::get('/updatePayment/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'editPayment'])->name('editPayment');
    Route::put('/updatePayment/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'updatePayment'])->name('updatePayment');

    Route::get('/updateReservation/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'editStatus'])->name('editStatus');
    Route::put('/updateReservation/{rental}', [App\Http\Controllers\Admin\RentalController::class, 'updateStatus'])->name('updateStatus');

    Route::get('/addAdmin', [usersController::class, 'create'])->name('addAdmin');
    Route::post('/addAdmin', [addNewAdminController::class, 'register'])->name('addNewAdmin');
    
    Route::get('/addCustomer', [usersController::class, 'create_customer'])->name('addCustomer');
    Route::post('/addCustomer', [AdminAddNewCustomerController::class, 'register_customer'])->name('addNewCustomer');
    // Route::delete('/deleteUser/{user}', [usersController::class, 'destroy'])->name('deleteUser');

    Route::get('/userDetails/{user}', [usersController::class, 'show'])->name('userDetails');
});


// ------------------- Customer routes --------------------------------------- //

Route::get('/reservations/{car}', [RentalController::class, 'create'])->name('car.reservation')->middleware('auth', 'restrictAdminAccess');
Route::post('/reservations/{car}', [RentalController::class, 'store'])->name('car.reservationStore')->middleware('auth', 'restrictAdminAccess');

Route::get('/reservations', function () {$rentals = Rental::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    return view('clientReservations', compact('rentals'));
})->name('clientReservation')->middleware('auth', 'restrictAdminAccess');

route::get('invoice/{reservation}', [invoiceController::class, 'invoice'])->name('invoice')->middleware('auth', 'restrictAdminAccess');

//---------------------------------------------------------------------------//

Auth::routes();
