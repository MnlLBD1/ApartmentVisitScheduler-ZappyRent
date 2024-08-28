<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTenantController;
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::middleware('auth', 'role:admin')->group(function () {
    Route::resource('admin/runners', AdminRunnerController::class);
    Route::resource('admin/tenants', AdminTenantController::class);
    Route::resource('admin/apartments', AdminController::class);
});

// Tenant Routes
Route::middleware('auth', 'role:tenant')->group(function () {
    Route::get('tenant/apartments', [TenantController::class, 'index'])->name('tenant.apartments.index');
    Route::post('tenant/request-visit/{apartment}', [TenantController::class, 'requestVisit'])->name('tenant.request_visit');
});

// Runner Routes
Route::middleware('auth', 'role:runner')->group(function () {
    Route::get('runner/schedule', [RunnerController::class, 'schedule'])->name('runner.schedule');
});


