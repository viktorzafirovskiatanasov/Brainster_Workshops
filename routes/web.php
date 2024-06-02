<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('companies.index');
});


// Route::resource('companies', CompanyController::class);

Route::get('/login',                                                [AdminController::class, 'index'])->name('auth.index');
Route::post('/login',                                               [AdminController::class, 'login'])->name('auth.login');
Route::get('/logout',                                               [AdminController::class, 'logout'])->name('auth.logout');

Route::get('/companies',                                            [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create',                                     [CompanyController::class, 'create'])->name('companies.create');
Route::get('/companies/{company}/edit',                             [CompanyController::class, 'edit'])->name('companies.edit');
Route::post('/companies',                                           [CompanyController::class, 'store'])->name('companies.store');
Route::patch('/companies/{company}',                                [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{company}',                               [CompanyController::class, 'destroy'])->name('companies.destroy');


Route::get('/companies/{company}/employees',                        [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/companies/{company}/employees/create',                 [EmployeeController::class, 'create'])->name('employees.create');
Route::get('/companies/{company}/employees/{employee}/edit',        [EmployeeController::class, 'edit'])->name('employees.edit');
Route::post('/companies/{company}/employees',                       [EmployeeController::class, 'store'])->name('employees.store');
Route::patch('/companies/{company}/employees/{employee}',           [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/companies/{company}/employees/{employee}',          [EmployeeController::class, 'destroy'])->name('employees.destroy');