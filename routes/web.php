<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\ServiceTypesController;
use App\Http\Controllers\Admin\PaymentChannelsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/get-project-data/{project}', [InvoiceController::class, 'getProjectData']);
Route::delete('image-by-path/{image}', [MediaController::class, 'destroyByPath'])->name('image.destroy-by-path');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
       
        Route::group(['middleware' => ['role:admin|technician|customer']], function () {
            Route::group(['prefix' => 'master-data', 'as' => 'master-data.'], function () {
                // Service Type
                Route::resource('service-types', ServiceTypesController::class);

                // Payment Channels
                Route::resource('payment-channels', PaymentChannelsController::class);
            });

            Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
                // Manajemen Proyek
                Route::resource('projects', ProjectsController::class);
                Route::resource('service-types', ServiceController::class);

                // Tagihan
                Route::resource('invoices', InvoiceController::class);

                // Pembayaran
                Route::resource('payments', PaymentController::class);

                // Manajemen User
                Route::resource('users', UserController::class);
            });

            Route::resource('reports', ReportController::class);
        });
    });
});


require __DIR__ . '/auth.php';
