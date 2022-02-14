<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionViewController;

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


// Auth
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'attempt'])->name('login.attempt');

Route::group(['middleware' => 'auth'], function() {
    // Auth
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboards
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Transaction Views
    Route::get('/transactions/all', [TransactionViewController::class, 'all'])->name('transaction-view.all');

    // Transactions
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'delete'])->name('transaction.delete');

    // Attachments
    Route::post('/transactions/{transaction}/attach', [AttachmentController::class, 'store'])->name('attachment.store');
    Route::get('/attachments/{attachment}', [AttachmentController::class, 'show'])->name('attachment.show');
    Route::put('/attachments/{attachment}', [AttachmentController::class, 'update'])->name('attachment.update');
    Route::delete('/attachments/{attachment}', [AttachmentController::class, 'delete'])->name('attachment.delete');
});
