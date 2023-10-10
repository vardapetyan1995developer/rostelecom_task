<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServiceController::class, 'suggestedServices'])->name('suggested-services');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('create', [ServiceController::class, 'create'])->name('create');
    Route::post('store', [ServiceController::class, 'store'])->name('store');
    Route::get('edit/{service}', [ServiceController::class, 'edit'])->name('edit');
    Route::patch('update/{service}', [ServiceController::class, 'update'])->name('update');
    Route::delete('delete/{service}', [ServiceController::class, 'destroy'])->name('delete');
});
