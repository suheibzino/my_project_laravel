<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\Api\LessonApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\EnrollmentApiController;
use App\Http\Controllers\Api\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

Route::get('/courses', [CourseApiController::class, 'index']);
Route::get('/courses/{id}', [CourseApiController::class, 'show'])->name('api.courses.show');
Route::get('/categories/{id}/courses', [CategoryApiController::class, 'coursesByCategory']);
Route::get('/courses/{id}/lessons', [LessonApiController::class, 'lessonsByCourse']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::apiResource('users', UserApiController::class);

    Route::apiResource('categories', CategoryApiController::class);
    Route::apiResource('courses', CourseApiController::class)->except(['index', 'show'])->names(['index' => 'api.courses.index', 'destroy' => 'api.courses.destroy', 'store' => 'api.courses.store']);
    Route::apiResource('lessons', LessonApiController::class);

    Route::get('/my-courses', [EnrollmentApiController::class, 'myCourses']);
    Route::post('/enroll', [EnrollmentApiController::class, 'enroll']);
    Route::apiResource('enrollments', EnrollmentApiController::class)->names(['index' => 'api.enrollments.index', 'destroy' => 'api.enrollments.destroy', 'store' => 'api.enrollments.store', 'show' => 'api.enrollments.show']);

});
