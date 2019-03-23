<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get("/login", "Admin\Auth\LoginController@showLoginForm")->name('admin.auth.login_form');
    Route::post("/login", "Admin\Auth\LoginController@login")->name('admin.auth.login');
    Route::post("/logout", "Admin\Auth\LoginController@logout")->name('admin.auth.logout');
    Route::get("/register", "Admin\Auth\RegisterController@showRegistrationForm")->name('admin.auth.register_form');
    Route::post("/register", "Admin\Auth\RegisterController@register")->name('admin.auth.register');
    Route::get("/home", "Admin\HomeController@index")->name('admin.home');
});

Route::prefix('adviser')->group(function () {
    Route::get("/login", "Adviser\Auth\LoginController@showLoginForm")->name('adviser.auth.login_form');
    Route::post("/login", "Adviser\Auth\LoginController@login")->name('adviser.auth.login');
    Route::post("/logout", "Adviser\Auth\LoginController@logout")->name('admin.auth.logout');
    Route::get("/register", "Adviser\Auth\RegisterController@showRegistrationForm")->name('adviser.auth.register_form');
    Route::post("/register", "Adviser\Auth\RegisterController@register")->name('adviser.auth.register');
    Route::get("/home", "Adviser\HomeController@index")->name('adviser.home');
});
