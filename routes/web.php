<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminReportController;
use App\Http\Controllers\Auth\LoginController;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/control', [SuperAdminController::class, 'index']);
Route::post('/control/add', [SuperAdminController::class, 'addUser']);
Route::get('/control/{role}/edit/{id}', [SuperAdminController::class, 'editUser']);
Route::post('/control/{role}/update/{id}', [SuperAdminController::class, 'updateUser']);
Route::post('/control/{role}/delete/{id}', [SuperAdminController::class, 'deleteUser'])->name('control.delete');

Route::get('/report', [SuperAdminReportController::class, 'index'])->name('report.index');
Route::get('/report/product', [SuperAdminReportController::class, 'product'])->name('report.product');
Route::get('/report/division', [SuperAdminReportController::class, 'division'])->name('report.division');
Route::get('/report/transaction', [SuperAdminReportController::class, 'transaction'])->name('report.transaction');
Route::get('/report/activity', [SuperAdminReportController::class, 'activity'])->name('report.activity');



// Route::get('/control', function () {
//     $users = User::all(); // sementara, nanti table-nya dibuat
//     return view('control', compact('users'));
// });



// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/control', [ControlController::class, 'index'])->name('control');
// });
