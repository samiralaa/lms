<?php

use Domains\Course\Controllers\CourseController;

use Illuminate\Support\Facades\Route;






Route::controller(CourseController::class)
    ->prefix('courses') // Change "coures" to "courses"
    ->group(function () {
        Route::get('', 'index')->name('courses.index');
        Route::get('create', 'create')->name('courses.create'); // This should now work
        Route::post('', 'store')->name('courses.store');
        Route::get('{id}/edit', 'edit')->name('courses.edit'); // This should now work
        Route::get('{id}', 'show')->name('courses.show');
        Route::put('{id}', 'update')->name('courses.update');
        Route::delete('{id}', 'destroy')->name('courses.destroy');
    });

//
