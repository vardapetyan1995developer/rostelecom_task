<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('disabled-services', [ServiceController::class, 'disabledServices']);
