<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

// Root → Login redirect
Route::get('/', function () {
    return redirect()->route('login');
});

// Login Page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Login Process
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (ONLY LOGGED IN USERS)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | STUDENTS
    |--------------------------------------------------------------------------
    */
    Route::resource('students', StudentController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | ATTENDANCE
    |--------------------------------------------------------------------------
    */
    Route::get('/attendance', [AttendanceController::class, 'index']);
    Route::post('/attendance/store', [AttendanceController::class, 'store']);

    /*
    |--------------------------------------------------------------------------
    | COURSES
    |--------------------------------------------------------------------------
    */
    Route::resource('courses', CourseController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | TEACHERS
    |--------------------------------------------------------------------------
    */
    Route::resource('teachers', TeacherController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | REPORTS
    |--------------------------------------------------------------------------
    */
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])->name('reports.pdf');

    /*
    |--------------------------------------------------------------------------
    | DEBUG
    |--------------------------------------------------------------------------
    */
    Route::get('/debug-attendance', function () {
        return \App\Models\Attendance::latest()->take(10)->get();
    });

});