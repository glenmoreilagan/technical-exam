<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/factories', [FactoryController::class, 'index'])->name('factories');
  Route::get('/factories/create', [FactoryController::class, 'create'])->name('factories.create');
  Route::get('/factories/edit/{id}', [FactoryController::class, 'show'])->name('factories.edit');
  Route::post('/factories', [FactoryController::class, 'store'])->name('factories.store');
  Route::put('/factories/{id}', [FactoryController::class, 'update'])->name('factories.update');
  Route::delete('/factories/{id}', [FactoryController::class, 'destroy'])->name('factories.delete');

  Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
  Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
  Route::get('/employees/edit/{id}', [EmployeeController::class, 'show'])->name('employees.edit');
  Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
  Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
  Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

require __DIR__ . '/auth.php';
