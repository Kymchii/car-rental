<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceTenantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentTenantController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminAuth'])->name('admin.')->group(function () {
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/tenants', TenantController::class);
    Route::resource('/admin/receipts', ReceiptController::class);
    Route::resource('/admin/vehicles', VehicleController::class);
    Route::resource('/admin/rents', RentController::class);
    Route::resource('/admin/invoices', InvoiceController::class);
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin');
});

Route::middleware(['auth', 'tenantAuth'])->name('tenant.')->group(function () {
    Route::resource('/tenant/invoices', InvoiceTenantController::class);
    Route::get('/tenant', [DashboardController::class, 'tenantDashboard'])->name('tenant');
});
