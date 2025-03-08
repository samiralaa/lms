<?php

use Domains\Course\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/create-students', [\Domains\Students\Controllers\StudentController::class, 'register']);
Route::get('/all-students', [\Domains\Students\Controllers\StudentController::class, 'allStudentsToDashboard']);

Route::get('get-coures',[CourseController::class,'index']);


Route::controller(CourseController::class)
    ->prefix('coures')
       ->group(function () {
        Route::get('', 'index')->name('coures.index');
        Route::get('{id}', 'show')->name('coures.show');
        Route::post('', 'store')->name('coures.store');
        Route::put('{id}', 'update')->name('coures.update');
    });
//
