<?php

use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdminControlController;
use App\Http\Controllers\SuperAdminReportController;
use App\Http\Controllers\SuperAdminAccessController;
use App\Http\Controllers\SuperAdminConstraintController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgotpass', [ForgotPasswordController::class, 'showForgot'])->name('forgot');
Route::post('/forgotpass', [ForgotPasswordController::class, 'submitForgot'])->name('forgot.submit');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/', [SuperAdminDashboardController::class, 'index'])->name('SuperAdmin.dashboard');

Route::get('/control', [SuperAdminControlController::class, 'index'])->name('SuperAdmin.control');
Route::post('/control/add', [SuperAdminControlController::class, 'addUser']);
Route::get('/control/role/edit/{role}/{id}', [SuperAdminControlController::class, 'editUser']);
Route::post('/control/update/{role}/{id}', [SuperAdminControlController::class, 'updateUser']);
Route::post('/control/role/delete/{role}/{id}', [SuperAdminControlController::class, 'deleteUser'])->name('control.delete');

Route::get('/report', [SuperAdminReportController::class, 'index'])->name('SuperAdmin.report');
Route::post('/report/product/add', [SuperAdminReportController::class, 'addProduct']);
Route::post('/report/transaksi/add', [SuperAdminReportController::class, 'addTransaksi']);
Route::post('/report/divisi/add', [SuperAdminReportController::class, 'addDivisi']);
Route::post('/report/riwayat/add', [SuperAdminReportController::class, 'addRiwayat']);
Route::get('/report/product', [SuperAdminReportController::class, 'product'])->name('SuperAdmin.report.product');
Route::get('/report/division', [SuperAdminReportController::class, 'division'])->name('SuperAdmin.report.division');
Route::get('/report/transaction', [SuperAdminReportController::class, 'transaction'])->name('SuperAdmin.report.transaction');
Route::get('/report/activity', [SuperAdminReportController::class, 'activity'])->name('SuperAdmin.report.activity');
Route::post('/report/product/delete/{id}', [SuperAdminReportController::class, 'deleteProduct'])->name('product.delete');
Route::post('/report/division/delete/{id}', [SuperAdminReportController::class, 'deleteDivision'])->name('division.delete');
Route::get('/report/transaction/view/{id}', [SuperAdminReportController::class, 'viewTransaction'])->name('transaction.view');
Route::post('/report/product/edit/{id}', [SuperAdminReportController::class, 'editProduct'])->name('product.edit');
Route::post('/report/division/edit/{id}', [SuperAdminReportController::class, 'editDivision'])->name('division.edit');

Route::get('/access', [SuperAdminAccessController::class, 'index'])->name('SuperAdmin.access');
Route::post('/access/update', [SuperAdminAccessController::class, 'update']);
Route::get('/superadmin', [SuperAdminAccessController::class, 'superadmin']);

Route::get('/constraint', [SuperAdminConstraintController::class, 'index']);


