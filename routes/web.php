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


Route::get("/login", "User\Auth\LoginController@showLoginForm")->name('login_form')->middleware('guest');
Route::post("/login", "User\Auth\LoginController@login")->name('login');
Route::get("/register", "User\Auth\RegisterController@showRegistrationForm")->name('register_form')->middleware('guest');
Route::post("/register", "User\Auth\RegisterController@register")->name('register')->middleware('guest');
Route::get('/email/verify/{id}', 'User\Auth\VerificationController@verify')->name('verification.verify');
Route::get('/email/resend', 'User\Auth\VerificationController@resend')->name('verification.resend')->middleware(['web', 'auth:user']);
Route::get('/email/show', 'User\Auth\VerificationController@show')->name('verification.notice')->middleware(['web','auth:user']);
Route::post("/logout", "User\Auth\LoginController@logout")->name('user.logout');
Route::get('/advisers', 'User\AdvisersController@index')->name('advisers.index');
Route::get('/advisers/show/{id}', 'User\AdvisersController@show')->name('advisers.show');


Route::middleware(['auth:user'])->name('user.')->group(function() {
    Route::get('/thanks', function () {
        return view('user.thanks');
    });
    Route::get("/mypage", "User\HomeController@mypage")->name('mypage');
});

Route::middleware(['verified', 'auth:user'])->name('user.')->group(function() {
    Route::get('/users/edit', 'User\UsersController@edit')->name('users.edit');
    Route::put('/users/update', 'User\UsersController@update')->name('users.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get("/", "Admin\HomeController@index")->name('auth.home');
    Route::get("/login", "Admin\Auth\LoginController@showLoginForm")->name('auth.login_form');
    Route::post("/login", "Admin\Auth\LoginController@login")->name('auth.login');
    Route::middleware('auth:admin')->group(function () {
        Route::post("/logout", "Admin\Auth\LoginController@logout")->name('auth.logout');
        Route::get("/register", "Admin\Auth\RegisterController@showRegistrationForm")->name('auth.register_form');
        Route::post("/register", "Admin\Auth\RegisterController@register")->name('auth.register');
        Route::get("/home", "Admin\HomeController@index")->name('home');
        Route::resource('/advisers', 'Admin\AdvisersController');
        Route::resource('/users', 'Admin\UsersController')->only(['index', 'show', 'destroy']);
    });
});

Route::prefix('adviser')->name('adviser.')->group(function () {
    Route::get("/login", "Adviser\Auth\LoginController@showLoginForm")->name('auth.login_form');
    Route::post("/login", "Adviser\Auth\LoginController@login")->name('auth.login');
    Route::middleware('auth:adviser')->group(function () {
        Route::post("/logout", "Adviser\Auth\LoginController@logout")->name('auth.logout');
        Route::get("/", "Adviser\HomeController@index")->name('home');
        Route::get("/edit", "Adviser\AdvisersController@edit")->name('advisers.edit');
        Route::put("/update/{id}", "Adviser\AdvisersController@update")->name('advisers.update');
    });
});

Route::get('/', function () {
    return view('top');
});
