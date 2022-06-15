<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserGroupController;

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


Route::get('/dashboard', function () {
    return view('backend.home.index');
})->name('dashboard.index');

Route::get('/website', function () {
    return view('frontend.home.index');
})->name('website.index');

Route::get('/login', function () {
    return view('backend.layouts.login');
});

Route::resource('news', NewsController::class);
Route::resource('categories', CategorieController::class);
Route::resource('userGroups',UserGroupController::class);
Route::resource('users',UserController::class);


