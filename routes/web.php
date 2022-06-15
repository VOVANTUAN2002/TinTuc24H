<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserGroupController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\NewsController;


use Illuminate\Support\Facades\Route;

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



Route::get('/website', function () {
    return view('frontend.home.index');
})->name('website.index');



Route::prefix('userGroups')->group(function () {
    Route::get('/trash', [UserGroupController::class, 'trashedItems'])->name('userGroups.trash');
    Route::delete('/force_destroy/{id}', [UserGroupController::class, 'force_destroy'])->name('userGroups.force_destroy');
    Route::get('/restore/{id}', [UserGroupController::class, 'restore'])->name('userGroups.restore');
});

Route::get('/login', function () {
    return view('backend.layouts.login');
});

Route::resource('news', NewsController::class);
Route::resource('categories', CategorieController::class);
Route::resource('userGroups',UserGroupController::class);
Route::resource('users',UserController::class);


Route::group([
    'prefix' => 'administrator',
    'middleware' => ['auth']
], function () {

 Route::resource('userGroups',UserGroupController::class);
 Route::get('/dashboard', function () {
    return view('backend.home.index');
    })->name('dashboard.index');
});

Route::get('administrator/login', [AuthController::class, 'login'])->name('login');
Route::post('administrator/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('administrator/logout', [AuthController::class, 'logout'])->name('logout');
