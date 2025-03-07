<?php

use Domains\Students\Controllers\StudentController;
use Illuminate\Support\Facades\Route;






Route::get('/', [\Domains\Students\Controllers\StudentController::class, 'register']);
//
