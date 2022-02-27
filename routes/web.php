<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
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
    Route::get('/transactions/{transaction}/copy', [TransactionController::class, 'copy'])->name('transaction.copy');

    // Attachments
    Route::post('/transactions/{transaction}/attach', [AttachmentController::class, 'store'])->name('attachment.store');
    Route::get('/attachments/{attachment}', [AttachmentController::class, 'show'])->name('attachment.show');
    Route::put('/attachments/{attachment}', [AttachmentController::class, 'update'])->name('attachment.update');
    Route::delete('/attachments/{attachment}', [AttachmentController::class, 'delete'])->name('attachment.delete');

    // Notes
    Route::get('/notes', [NoteController::class, 'index'])->name('note.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('note.store');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/notes/{note}', [NoteController::class, 'delete'])->name('note.delete');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'delete'])->name('category.delete');
});
