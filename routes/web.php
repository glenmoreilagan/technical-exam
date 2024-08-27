<?php

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
  Route::post('/factories', [FactoryController::class, 'create'])->name('factories.create');
  Route::put('/factories/{id}', [FactoryController::class, 'update'])->name('factories.update');
  Route::delete('/factories/{id}', [FactoryController::class, 'destroy'])->name('factories.delete');

  Route::get('/employees', fn() => view('Employees.employees'))->name('employees');
});

require __DIR__ . '/auth.php';
