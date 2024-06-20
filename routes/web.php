<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\EvaluateController;

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
Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');

Route::get('/admin', function(){
    return view('admin/admin');
})->name('admin');
Route::resource('staff', StaffController::class);
Route::resource('evaluate', EvaluateController::class);
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
Route::resource('employees', EmployeeController::class);
Route::get('/admin/bookManagement', [BookController::class, 'index'])->name('books.index');
Route::resource('books', BookController::class);