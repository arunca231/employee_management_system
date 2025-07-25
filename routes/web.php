<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.employ_list');
Route::get('/employ/create', [App\Http\Controllers\Admin\DashboardController::class, 'create'])->name('admin.employ_create');
Route::post('/employ/store', [App\Http\Controllers\Admin\DashboardController::class, 'store'])->name('admin.employ_store');

Route::post('/employ/filter', [App\Http\Controllers\Admin\ReportController::class, 'employ_filter'])->name('admin.employ_filter');
Route::get('/employ/excel-export', [App\Http\Controllers\Admin\ReportController::class, 'excel_export'])->name('admin.employ_export');
