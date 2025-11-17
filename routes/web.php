<?php

use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdminControlController;
use App\Http\Controllers\SuperAdminReportController;
use App\Http\Controllers\SuperAdminAccessController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SuperAdminDashboardController::class, 'index'])->name('SuperAdmin');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgotpass', [ForgotPasswordController::class, 'showForgot'])->name('forgot');
Route::post('/forgotpass', [ForgotPasswordController::class, 'submitForgot'])->name('forgot.submit');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/control', [SuperAdminControlController::class, 'index'])->name('SuperAdmin.control');
Route::post('/control/add', [SuperAdminControlController::class, 'addUser']);
Route::get('/control/role/edit/{role}/{id}', [SuperAdminControlController::class, 'editUser']);
Route::post('/control/update/{role}/{id}', [SuperAdminControlController::class, 'updateUser']);
Route::post('/control/role/delete/{role}/{id}', [SuperAdminControlController::class, 'deleteUser'])->name('control.delete');

Route::get('/report', [SuperAdminReportController::class, 'index'])->name('SuperAdmin.report');
Route::get('/report/product', [SuperAdminReportController::class, 'product'])->name('SuperAdmin.report.product');
Route::get('/report/division', [SuperAdminReportController::class, 'division'])->name('SuperAdmin.report.division');
Route::get('/report/transaction', [SuperAdminReportController::class, 'transaction'])->name('SuperAdmin.report.transaction');
Route::get('/report/activity', [SuperAdminReportController::class, 'activity'])->name('SuperAdmin.report.activity');

Route::get('/access', [SuperAdminAccessController::class, 'index'])->name('SuperAdmin.access');
Route::post('/access/update', [SuperAdminAccessController::class, 'update']);
Route::get('/superadmin', [SuperAdminAccessController::class, 'superadmin']);
