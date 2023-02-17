<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/users', function () {
//     return view('index');
// });
// Route::get('table', function () {
//     return view('table');
// });
// Route::post('/users',[studentController::class,'store']);
//permission check for login user
// Route::group(['middleware' => ['auth','permission:view|create|edit|delete']], function () {
//     Route::resource('student', StudentController::class);
// });
Route::resource('student', StudentController::class)->middleware('auth');
Route::view('admin','admin.index');
Route::controller(AuthController::class)->group( function() {
    Route::get('login','index')->name('login')->middleware('guest');
    Route::get('register','register')->name('register')->middleware('guest');
    Route::post('registration','validate_registration')->name('registration');
    Route::post('login-user','validate_login')->name('login-user');
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('logout','logout')->name('logout');
});
Route::get('search',[SearchController::class,'search'])->name('search');
Route::prefix('admin')->group(function () {
    //Users Routes
    Route::get('users/index', [UsersController::class,'index'])->name('user.index');
    Route::get('users/create', [UsersController::class,'create'])->name('user.create');
    Route::get('users/edit/{id}', [UsersController::class,'edit'])->name('user.edit');
    Route::put('users/update/{id}', [UsersController::class,'update'])->name('user.update');
    Route::delete('users/destroy/{id}', [UsersController::class,'destroy'])->name('user.destroy');

    // Route::view('student', 'admin.student');
    Route::get('student', [StudentController::class, 'index'])->name('student');
    Route::get('users', [AdminController::class,'index'])->name('users');
    Route::put('edit/{id}', [AdminController::class,'update'])->name('edit');
    // Teacher Routes
    Route::get('teacher/index', [TeacherController::class,'index'])->name('teacher.index');
    Route::get('teacher/create', [TeacherController::class,'create'])->name('teacher.create');
    Route::post('teacher/store', [TeacherController::class,'store'])->name('teacher.store');
    Route::get('teacher/edit/{id}', [TeacherController::class,'edit'])->name('teacher.edit');
    Route::put('teacher/update/{id}', [TeacherController::class,'update'])->name('teacher.update');
    Route::delete('teacher/destroy/{id}', [TeacherController::class,'destroy'])->name('teacher.destroy');
    // Permissions Routes
    Route::get('permissions/index', [PermissionController::class,'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class,'create'])->name('permissions.create');
    Route::post('permissions/store', [PermissionController::class,'store'])->name('permissions.store');
    Route::get('permissions/edit/{id}', [PermissionController::class,'edit'])->name('permissions.edit');
    Route::put('permissions/update/{id}', [PermissionController::class,'update'])->name('permissions.update');
    Route::delete('permissions/destroy/{id}', [PermissionController::class,'destroy'])->name('permissions.destroy');
    //Role Route
    Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/update/{id}', [RoleController::class,'update'])->name('roles.update');
    Route::delete('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    // Courses Route
    Route::get('courses',[CourseController::class,'index'])->name('courses.index');
    Route::post('create',[CourseController::class,'create'])->name('course.create');
    Route::post('store',[CourseController::class,'store'])->name('course.store');
    Route::get('edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    Route::put('update/{id}',[CourseController::class,'update'])->name('course.update');
    Route::delete('destroy/{id}',[CourseController::class,'destroy'])->name('course.destroy');



})->middleware('auth');
// Route::group(['middleware'=>['auth']], function() {
//     Route::get('login',[AuthController::class,'index'])->name('login');
//     Route::get('register',[AuthController::class,])->name('register');
//     Route::post('registration',[AuthController::class,'validate_registration'])->name('registration');
//     Route::post('login-user',[AuthController::class,'validate_login'])->name('login-user');
//     Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
//     Route::get('logout',[AuthController::class,'logout'])->name('logout');
// });
