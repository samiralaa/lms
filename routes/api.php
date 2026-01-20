<?php

use Illuminate\Http\Request;
use Domains\Category\Controllers\CategoryController;
use Domains\Contact\Controllers\ContactController;
use Domains\Course\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Email\EmailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/create-students', [\Domains\Students\Controllers\StudentController::class, 'register']);
Route::get('/all-students', [\Domains\Students\Controllers\StudentController::class, 'allStudentsToDashboard']);

Route::get('get-coures',[CourseController::class,'index']);

// Contact API Routes
Route::prefix('contacts')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
    Route::post('/', [ContactController::class, 'store']);
    Route::get('/search', [ContactController::class, 'search']);
    Route::get('/stats', [ContactController::class, 'stats']);
    Route::get('/categories', [ContactController::class, 'categories']);
    Route::get('/statuses', [ContactController::class, 'statuses']);
    Route::get('/status/{status}', [ContactController::class, 'getByStatus']);
    Route::get('/category/{category}', [ContactController::class, 'getByCategory']);
    Route::patch('/{id}/status', [ContactController::class, 'updateStatus']);
    Route::get('/{id}', [ContactController::class, 'show']);
    Route::put('/{id}', [ContactController::class, 'update']);
    Route::delete('/{id}', [ContactController::class, 'destroy']);
});

// Category API Routes
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/search', [CategoryController::class, 'search']);
    Route::get('/stats', [CategoryController::class, 'stats']);
    Route::get('/active', [CategoryController::class, 'active']);
    Route::get('/names', [CategoryController::class, 'names']);
    Route::get('/with-contact-count', [CategoryController::class, 'withContactCount']);
    Route::patch('/{id}/toggle-active', [CategoryController::class, 'toggleActive']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::get('sendrmails',[EmailController::class, 'sendEmailsToAllStudents']);
//
