<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::post('employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('employees/{id}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('employees/{id}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('employees/search',[EmployeeController::class,'search'])->name('employees.search');



Route::get('departments/create',[DepartmentController::class,'create'])->name('departments.create');
Route::get('departments',[DepartmentController::class,'index'])->name('departments.index');
// Route::get('departments',[DepartmentController::class,'annexe'])->name('departments.annexe');
Route::post('departments',[DepartmentController::class,'store'])->name('departments.store');
Route::get('departments/{id}/edit',[DepartmentController::class,'edit'])->name('departments.edit');
Route::delete('departments/{id}',[DepartmentController::class,'destruction'])->name('departments.destruction');
Route::put('departments/{id}',[DepartmentController::class,'update'])->name('departments.update');

