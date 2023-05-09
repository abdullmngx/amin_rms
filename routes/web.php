<?php

use App\Http\Controllers\ConfigurationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProgrammeCourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect(route('staff.register'));
});

Route::prefix('staff')->group(function () {
    Route::get('/register', [StaffController::class, 'register'])->name('staff.register');
    Route::post('/register', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/login', [StaffController::class, 'login'])->name('staff.login');
    Route::post('/login', [StaffController::class, 'authenticate'])->name('staff.auth');

    Route::group(['middleware' => 'auth.staff'], function () {
        Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
        Route::get('/courses', [StaffController::class, 'courses'])->name('staff.courses');
        Route::post('/courses', [CourseController::class, 'store'])->name('staff.store_course');
        Route::get('/courses/delete/{course_id}', [CourseController::class, 'delete'])->name('staff.delete_course');
        Route::get('/programme-courses', [StaffController::class, 'programmeCourses'])->name('staff.programme_courses');
        Route::get('/programmes/courses/{programme_id}', [ProgrammeController::class, 'programmecourses'])->name('programme.courses');
        Route::post('/programmes/courses/remove', [ProgrammeCourseController::class, 'remove'])->name('programme_course.remove');
        Route::post('/programmes/courses/{programme_id}', [ProgrammeCourseController::class, 'store'])->name('programme_course.store');
        Route::get('/my-courses', [StaffController::class, 'myCourses'])->name('staff.my_courses');
        Route::get('/assign/{course_id}', [StaffController::class, 'assign'])->name('staff.assign');
        Route::get('/unassign/{course_id}', [StaffController::class, 'unassign'])->name('staff.unassign');
        Route::get('/scores-upload', [StaffController::class, 'scoresUpload'])->name('staff.scores_upload');
        Route::get('/scores-upload/{course_id}', [StaffController::class, 'upload'])->name('staff.upload');
        Route::post('/scores-upload/{course_id}', [StaffController::class, 'saveScores'])->name('staff.save_scores');
        Route::get('config', [StaffController::class, 'config'])->name('staff.config');
        Route::get('staffs', [StaffController::class, 'staffs'])->name('staff.staffs');
            Route::get('students', [StaffController::class, 'students'])->name('staff.students');
        Route::post('/config', [ConfigurationController::class, 'save'])->name('staff.save_config');
        Route::get('/logout', function () {
            Auth::guard('staff')->logout();
            return back();
        });
    });
    
});

Route::prefix('student')->group(function () {
    Route::get('/register', [StudentController::class, 'register'])->name('student.register');
    Route::post('/register', [StudentController::class, 'store'])->name('student.store');
    Route::get('/login', [StudentController::class, 'login'])->name('student.login');
    Route::post('/login', [StudentController::class, 'authenticate'])->name('student.authenticate');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        Route::get('/courses', [StudentController::class, 'courses'])->name('student.courses');
        Route::get('/courses/register/{course_id}', [StudentCourseController::class, 'register'])->name('student.register_course');
        Route::get('/courses/unregister/{course_id}', [StudentCourseController::class, 'unregister'])->name('student.unregister_course');
        Route::get('/result', [StudentController::class, 'result'])->name('student.result');
        Route::get('/result/{level_id}/{semester_id}', [StudentController::class, 'getResult'])->name('student.get_result');
        Route::get('/logout', function () {
            Auth::logout();
            return back();
        });
    });
});