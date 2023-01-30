<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
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
Route::resource('student', StudentController::class)->middleware('auth');
// Route::get('/', ['users'=>$users]);
Route::controller(AuthController::class)->group( function() {
    Route::get('login','index')->name('login')->middleware('guest');
    Route::get('register','register')->name('register')->middleware('guest');
    Route::post('registration','validate_registration')->name('registration');
    Route::post('login-user','validate_login')->name('login-user');
    Route::get('dashboard','dashboard')->name('dashboard');
    Route::get('logout','logout')->name('logout');
});
Route::get('search',[SearchController::class,'search'])->name('search');
// Route::group(['middleware'=>['auth']], function() {
//     Route::get('login',[AuthController::class,'index'])->name('login');
//     Route::get('register',[AuthController::class,])->name('register');
//     Route::post('registration',[AuthController::class,'validate_registration'])->name('registration');
//     Route::post('login-user',[AuthController::class,'validate_login'])->name('login-user');
//     Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
//     Route::get('logout',[AuthController::class,'logout'])->name('logout');
// });
