<?php

use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\ControlController;
use App\Http\Controllers\SuperAdmin\ReportController;
use App\Http\Controllers\SuperAdmin\AccessController;
use App\Http\Controllers\SuperAdmin\ConstraintController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminTransactionController;
use Illuminate\Support\Facades\Route;

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/forgotpass', [ForgotPasswordController::class, 'showForgot'])->name('forgot');
// Route::post('/forgotpass', [ForgotPasswordController::class, 'submitForgot'])->name('forgot.submit');

// Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Route::prefix('superadmin')->middleware('auth')->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('SuperAdmin.dashboard');

//     Route::get('/control', [ControlController::class, 'index'])->name('SuperAdmin.control');
//     Route::post('/control/add', [ControlController::class, 'addUser']);
//     Route::get('/control/role/edit/{role}/{id}', [ControlController::class, 'editUser']);
//     Route::post('/control/update/{role}/{id}', [ControlController::class, 'updateUser']);
//     Route::post('/control/role/delete/{role}/{id}', [ControlController::class, 'deleteUser'])->name('control.delete');

//     Route::get('/report', [ReportController::class, 'index'])->name('SuperAdmin.report');
//     Route::post('/report/product/add', [ReportController::class, 'addProduct']);
//     Route::post('/report/transaksi/add', [ReportController::class, 'addTransaksi']);
//     Route::post('/report/divisi/add', [ReportController::class, 'addDivisi']);
//     Route::post('/report/riwayat/add', [ReportController::class, 'addRiwayat']);
//     Route::get('/report/product', [ReportController::class, 'product'])->name('SuperAdmin.report.product');
//     Route::get('/report/division', [ReportController::class, 'division'])->name('SuperAdmin.report.division');
//     Route::get('/report/transaction', [ReportController::class, 'transaction'])->name('SuperAdmin.report.transaction');
//     Route::get('/report/activity', [ReportController::class, 'activity'])->name('SuperAdmin.report.activity');
//     Route::post('/report/product/delete/{id}', [ReportController::class, 'deleteProduct'])->name('product.delete');
//     Route::post('/report/division/delete/{id}', [ReportController::class, 'deleteDivision'])->name('division.delete');
//     Route::get('/report/transaction/view/{id}', [ReportController::class, 'viewTransaction'])->name('transaction.view');
//     Route::post('/report/product/edit/{id}', [ReportController::class, 'editProduct'])->name('product.edit');
//     Route::post('/report/division/edit/{id}', [ReportController::class, 'editDivision'])->name('division.edit');

//     Route::get('/access', [AccessController::class, 'index'])->name('SuperAdmin.access');
//     Route::post('/access/update', [AccessController::class, 'update']);
//     Route::get('/superadmin', [AccessController::class, 'superadmin']);

//     Route::get('/constraint', [ConstraintController::class, 'index'])->name('SuperAdmin.constraint');
// });

// Route::get('/dashboard', function () {
//     return redirect()->route('SuperAdmin.index');
// })->middleware('auth');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

Route::get('/transaction', [AdminTransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/create', [AdminTransactionController::class, 'create'])->name('transaction.create');
Route::delete('/transaction/{id}/delete', [TransactionController::class, 'delete'])->name('transaction.delete');
