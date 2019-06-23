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

if(env('APP_ENV') !== 'local'){
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

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
Route::get('/password/reset', 'User\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'User\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'User\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'User\Auth\ResetPasswordController@reset')->name('password.update');

Route::middleware(['auth:user'])->name('user.')->group(function() {
    Route::get('/thanks', function () {
        return view('user.thanks');
    });
    Route::get("/mypage", "User\UsersController@view")->name('mypage');
});

Route::middleware(['verified', 'auth:user'])->name('user.')->group(function() {
    Route::get('/users/edit', 'User\UsersController@edit')->name('users.edit');
    Route::put('/users/update', 'User\UsersController@update')->name('users.update');
    Route::post('/users/updateUserName', 'User\UsersController@updateUserName')->name('users.update_user_name');
    Route::post('/users/updateUniversity', 'User\UsersController@updateUniversity')->name('users.update_university');
    Route::post('/users/updateInformalDecision', 'User\UsersController@updateInformalDecision')->name('users.update_informal_decision');
    Route::post('/users/updateDesire', 'User\UsersController@updateDesire')->name('users.update_desire');
    Route::post('users/uploadPhoto', 'User\UsersController@uploadPhoto')->name('users.upload_photo');
    Route::post('users/updateEmail', 'User\UsersController@updateEmail')->name('users.update_email');
    Route::post('users/updatePassword', 'User\UsersController@updatePassword')->name('users.update_password');
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
        Route::resource('/advisers', 'Admin\AdvisersController')->except(['update']);
        Route::put("/update/{id}", "Admin\AdvisersController@update")->name('advisers.update');
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

Route::get('/company', function () {
    return view('user.company');
})->name('company');
