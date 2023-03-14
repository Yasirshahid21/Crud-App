<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsersController, AuthController, CategoryController, ProductController, PostController};
use App\Models\Category;

// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\ProductController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('product', ProductController::class);

//public Route

// Route::get('product', [ProductController::class, 'index']);
// Route::get('product/{id}', [ProductController::class, 'show']);
// Route::resource('post', PostController::class);
Route::resource('product', ProductController::class)->except('store', 'update', 'destory');
Route::get('product/search/{name}', [ProductController::class, 'search']);
Route::get('users/index', [UsersController::class, 'index'])->name('user.index');
Route::post('registration', [AuthController::class, 'validate_registration'])->name('registration');
Route::post('login', [AuthController::class, 'validate_login'])->name('login');
Route::resource('category', CategoryController::class);

//Protect Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::get('product/search/{name}', [ProductController::class, 'search']);
    Route::resource('product', ProductController::class)->except('index', 'show');
    Route::resource('post', PostController::class);
    // Route::post('product', [ProductController::class, 'store']);
    // Route::put('product/{id}', [ProductController::class, 'update']);
    // Route::delete('product/{id}', [ProductController::class, 'destroy']);
});
