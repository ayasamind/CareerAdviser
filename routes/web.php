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

Route::get("/", "User\PageController@top")->name('top');
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

// ログインURL
Route::get('auth/twitter', 'User\Auth\RegisterController@redirectToProviderForTwitter')->name('auth.twitter');
// コールバックURL
Route::get('auth/twitter/callback', 'User\Auth\RegisterController@handleProviderCallbackForTwitter');

Route::get('auth/facebook', 'User\Auth\RegisterController@redirectToProviderForFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'User\Auth\RegisterController@handleProviderCallbackForFacebook');

Route::middleware(['auth:user'])->name('user.')->group(function() {
    Route::get('/thanks', function () {
        return view('user.thanks');
    });
    Route::get('/thanks_social', function () {
        return view('user.thanks_social');
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
    Route::get('/advisers/confirm/{id}/{dt}/{type}', 'User\AdvisersController@confirm')->name('adviser_confirm');
    Route::post('/advisers/saveRequest', 'User\AdvisersController@saveRequest')->name('save_request');
    Route::get('/advisers/done/{id}', 'User\AdvisersController@done')->name('done_request');
    Route::post('/advisers/sendRequest', 'User\AdvisersController@sendRequest')->name('send_request');

    Route::get('/advisers/review/{id}', 'User\AdvisersController@review')->name('review');
    Route::post('/advisers/save_review/{id}', 'User\AdvisersController@save_review')->name('save_review');
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
        Route::resource('/requests', 'Admin\MeetingRequestsController')->only(['index', 'show']);
        Route::get('/reviews', 'Admin\MeetingRequestsController@reviews')->name('reviews');
        Route::post('/reviews/{id}', 'Admin\MeetingRequestsController@delete_review')->name('review.destroy');
    });
});

Route::prefix('adviser')->name('adviser.')->group(function () {
    Route::get("/login", "Adviser\Auth\LoginController@showLoginForm")->name('auth.login_form');
    Route::post("/login", "Adviser\Auth\LoginController@login")->name('auth.login');
    // Route::get('/password/reset', 'Adviser\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email', 'Adviser\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('/password/reset/{token}', 'Adviser\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('/password/reset', 'Adviser\Auth\ResetPasswordController@reset')->name('password.update');
    Route::middleware('auth:adviser')->group(function () {
        Route::post("/logout", "Adviser\Auth\LoginController@logout")->name('auth.logout');
        Route::get("/", "Adviser\HomeController@index")->name('home');
        Route::get("/edit", "Adviser\AdvisersController@edit")->name('advisers.edit');
        Route::put("/update/{id}", "Adviser\AdvisersController@update")->name('advisers.update');
        Route::resource('/requests', 'Adviser\MeetingRequestsController')->only(['index', 'edit', 'update']);
        Route::get('/schedules', 'Adviser\AdviserSchedulesController@index')->name('schedules.index');
        Route::get('/schedules/{id}/edit', 'Adviser\AdviserSchedulesController@edit')->name('schedules.edit');
        Route::post('/schedules/{id}/update', 'Adviser\AdviserSchedulesController@update')->name('schedules.update');
        Route::get('/users/{id}', 'Adviser\UsersController@show')->name('user.show');
        Route::get('/password/change', 'Adviser\AdvisersController@changePassword')->name('password.change');
        Route::post('/password/update', 'Adviser\AdvisersController@updtePassword')->name('password.update');
    });
});

Route::get('/company', function () {
    return view('user.company');
})->name('company');

Route::get('/policy', function () {
    return view('user.policy');
})->name('policy');

Route::get('/terms', function () {
    return view('user.terms');
})->name('terms');

Route::get('/verified', function () {
    return view('user.verified');
})->name('verified_email');
