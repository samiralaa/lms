<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/create-students', [\Domains\Students\Controllers\StudentController::class, 'register']);
Route::get('/all-students', [\Domains\Students\Controllers\StudentController::class, 'allStudentsToDashboard']);



