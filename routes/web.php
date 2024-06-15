<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentAdminController;
use App\Http\Controllers\TeacherController;
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

Route::middleware(['checkLogin'])->group(function () {
    Route::get('/', [StudentController::class, 'dashboard']);
    Route::get('/dashboard', [StudentController::class, 'dashboard']);
        
    Route::get('/course/lesson-plan/{id}', [TeacherController::class, 'show_lesson_plan']);



    // student POV
    // enrollment
    Route::get('/student/enroll', [StudentController::class, 'enrollment']);
    Route::get('/student/enrollments', [StudentController::class, 'enrollments']);
    Route::post('/student/store-enrollment', [StudentController::class, 'save_enrollment']);


});


Route::middleware(['isSuperAdmin'])->group(function () {
        
    // dept
    Route::get('/admin/add-department', [DepartmentController::class, 'add_department']);
    Route::get('/admin/departments', [DepartmentController::class, 'all_departments']);
    Route::post('/admin/store-department', [DepartmentController::class, 'store_department']);
    Route::get('/admin/department/edit/{id}', [DepartmentController::class, 'edit_department']);
    Route::post('/admin/department/update/{id}', [DepartmentController::class, 'update_department']);
    Route::get('/admin/department/delete/{id}', [DepartmentController::class, 'delete_department']);

    // dept admin 
    Route::get('/admin/add-department-admin', [DepartmentAdminController::class, 'add_department_admin']);
    Route::post('/admin/store-department-admin', [DepartmentAdminController::class, 'store_dp_admin']);
    Route::get('/admin/department-admins', [DepartmentAdminController::class, 'all_department_admins']);
    Route::get('/admin/dept-admin/edit/{id}', [DepartmentAdminController::class, 'edit_department_admin']);
    Route::post('/admin/dept-admin/update/{id}', [DepartmentAdminController::class, 'update_department_admin']);
    Route::get('/admin/dept-admin/delete/{id}', [DepartmentAdminController::class, 'delete_department_admin']);

});


Route::middleware(['checkLogin',  'isDepartmentAdmin', 'isTeacher'])->group(function () {
    Route::get('/course/all', [TeacherController::class, 'all_courses']);
    // teacher POV
    Route::get('/teacher/my-courses', [TeacherController::class, 'my_courses']);
    // Route::get('/teacher/my-courses', [TeacherController::class, 'my_courses']);
    Route::get('/teacher/create-lesson-plan', [TeacherController::class, 'create_lesson_plan']);
    Route::post('/teacher/store-lesson-plan', [TeacherController::class, 'store_lesson_plan']);

});





Route::middleware(['checkLogin', 'isDepartmentAdmin'])->group(function () {
    // course
    Route::get('/department-admin/add-course', [CourseController::class, 'addcourse']);
    Route::post('/department-admin/store-course', [CourseController::class, 'store_course']);
    Route::get('/course/delete/{id}', [CourseController::class, 'delete_course']);
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-confirm', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login-verify', [AuthController::class, 'loginConfirm']);



// section
Route::get('/teacher/add-section', [SectionController::class, 'add_section']);
Route::post('/teacher/store-section', [SectionController::class, 'store_section']);