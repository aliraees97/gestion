<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/cl', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return "cache is clear";
});


// Home route
Route::get('/', function () {
    return view('layouts.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// dashboard Routes
// Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');





Route::middleware(['auth', 'is_admin'])->group(function () {

    // dashboard Routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Client Or Customer Routes
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::post('/add-client', [ClientController::class, 'clientStore'])->name('add-client');
    Route::get('/customer/{id}', [ClientController::class, 'edit']);
    Route::get('/detail/{id}', [ClientController::class, 'customerDetail']);
    Route::post('/update-client-note', [ClientController::class, 'noteUpdate'])->name('update-client-note');
    Route::post('/customer/update', [ClientController::class, 'clientUpdate']);
    Route::get('/delete-client/{id}', [ClientController::class, 'clientDelete'])->name('delete-client');


    // Package OR WashTypes Routes
    Route::get('/wash-type', [PackageController::class, 'index'])->name('wash-type');
    Route::post('/add-washType', [PackageController::class, 'washTypeStore'])->name('add-washType');
    Route::post('/wash-types/update', [PackageController::class, 'washTypeUpdate'])->name('wash-types.update');
    Route::get('/delete-washType/{id}', [PackageController::class, 'washTypeDelete'])->name('delete-washType');

    // Service OR Addons Routes
    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::post('/add-services', [ServiceController::class, 'serviceStore'])->name('add-services');
    Route::post('/service/update', [ServiceController::class, 'serviceUpdate'])->name('service.update');
    Route::get('/delete-service/{id}', [ServiceController::class, 'serviceDelete'])->name('delete-service');

    // Payment Types Routes
    Route::get('/payment-types', [PaymentController::class, 'index'])->name('payment-types');
    Route::post('/add-paymentType', [PaymentController::class, 'paymentStore'])->name('add-paymentType');
    Route::post('/payment-types/update', [PaymentController::class, 'paymentTypeUpdate'])->name('payment-types.update');
    Route::get('/delete-paymentTypes/{id}', [PaymentController::class, 'paymentTypeDelete'])->name('delete-paymentTypes');

    // Record Sale Or Gestions  Routes
    Route::get('/gestion', [ManagementController::class, 'index'])->name('gestion');
    Route::Post('/add-record', [ManagementController::class, 'storeRecord'])->name('add-record');
    Route::get('/get-record/{id}', [ManagementController::class, 'getRecord']);
    Route::post('/record/update', [ManagementController::class, 'updateRecord']);
    Route::get('/delete-record/{id}', [ManagementController::class, 'recordDelete'])->name('delete-paymentTypes');

    // Record Sale Close  Routes
    Route::post('/close-todays-sale', [ManagementController::class, 'closeTodaySale'])->name('close.daily.sale');
    Route::get('/get-closed-sales', [ManagementController::class, 'getClosedSales'])->name('get-closed-sales');




    // Cars  Routes
    Route::get('/car', [CarController::class, 'index'])->name('car');
    Route::Post('/add-car', [CarController::class, 'carStore'])->name('add-car');
    Route::post('/car/update', [CarController::class, 'carUpdate']);
    Route::get('/delete-car/{id}', [CarController::class, 'carDelete']);
});
