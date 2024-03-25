<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    // return view('login');
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.index');
    })->name('dashboard');
});

// Colors
Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
Route::get('/colors/{color}/edit', [ColorController::class, 'edit']);
Route::put('/colors/{color}', [ColorController::class, 'update'])->name('colors.update');
Route::delete('/colors/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');

// Capacity
Route::resource('capacities', CapacityController::class);

// Manufacturer
Route::get('manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers.index');
Route::post('manufacturers', [ManufacturerController::class, 'store'])->name('manufacturers.store');
Route::get('manufacturers/{manufacturer}/edit', [ManufacturerController::class, 'edit'])->name('manufacturers.edit');
Route::put('manufacturers/{manufacturer}', [ManufacturerController::class, 'update'])->name('manufacturers.update');
Route::delete('manufacturers/{manufacturer}', [ManufacturerController::class, 'destroy'])->name('manufacturers.destroy');

// Category
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
