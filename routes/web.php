<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Course;
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


Route::get('/', [LandingController::class, 'index'])->name('landing');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
//Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('courses', CourseController::class)->except(['show'])->middleware('auth');
Route::resource('lessons', LessonController::class)->middleware('auth');
Route::resource('enrollments', EnrollmentController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', 'is_admin']);
    Route::get('/admin/courses/create', [AdminController::class, 'createCourse'])->name('admin.courses.create');
    Route::post('/admin/courses/store', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::get('/admin/courses/{id}/edit', [AdminController::class, 'editCourse'])->name('admin.courses.edit');
    Route::put('/admin/courses/{id}', [AdminController::class, 'updateCourse'])->name('admin.courses.update');
    Route::delete('/admin/courses/{id}', [AdminController::class, 'deleteCourse'])->name('admin.courses.delete');
});


Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');


Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->prefix('student')->group(function () {
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
});
Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');



Route::get('/courses/{course}/lessons', [LessonController::class, 'index'])->name('lessons.byCourse');


Route::get('/admin/courses/{course}/lessons', [LessonController::class, 'show'])->name('admin.lessons.show');

Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');
Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
Route::get('/admin/courses/{course}/lessons', [LessonController::class, 'show'])->name('admin.lessons.show');
