<?php

use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// === AUTHENTICATION ===
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'Backend\AuthController@login')->name('login');
    Route::post('/login', 'Backend\AuthController@authenticate')->name('backend.authenticate');
    Route::get('/logout', 'Backend\AuthController@logout')->name('backend.logout')->middleware('auth');
    Route::get('/register', 'Backend\AuthController@register_form')->name('backend.register_form');
    Route::post('/register', 'Backend\AuthController@register')->name('backend.register');
    // lupa password
    Route::get('/lupa-password', 'Backend\AuthController@forgotPasswordForm')->name('backend.forgot_password_form');
    Route::post('/lupa-password', 'Backend\AuthController@forgotPassword')->name('backend.forgot_password');
    Route::get('/lupa-password/{email}', 'Backend\AuthController@confirmResetPassword')->name('backend.confirm_reset_password');
    // reset password
    Route::get('/reset-password/{email}', 'Backend\AuthController@resetPasswordForm')->name('backend.reset_password_form');
    Route::post('/reset-password', 'Backend\AuthController@resetPassword')->name('backend.reset_password');
    // sns login
    Route::get('/{provider}', 'Backend\SocialiteController@redirectToProvider')->name('backend.socialite_redirect');
    Route::get('/{provider}/callback', 'Backend\SocialiteController@handleProviderCallback')->name('backend.socialite_callback');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('backend.index');

    // === USER ===
    Route::resource('user', 'Backend\UserController')->except('destroy');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/change-password', 'Backend\UserController@changePasswordForm')->name('user.change_password_form');
        Route::post('/change-password', 'Backend\UserController@changePassword')->name('user.change_password');
    });

    // === CUSTOMER ===
    Route::resource('customer', 'Backend\CustomerController')->except('destroy');
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/{customer}/delete', 'Backend\CustomerController@destroy')->name('customer.delete');
        // customer debt
        Route::get('/{customer}/create-debt', 'Backend\DebtController@create')->name('customer.create_debt');
        Route::post('/{customer}/store-debt', 'Backend\DebtController@store')->name('customer.store_debt');
    });

    // === DEBT ===
    Route::resource('debt', 'Backend\DebtController')->except('create', 'store', 'destroy');
    Route::group(['prefix' => 'debts'], function () {
        Route::get('/{customerDebt}/change-status', 'Backend\DebtController@changeStatus')->name('debt.change_status');
        Route::get('/{customerDebt}/delete', 'Backend\DebtController@destroy')->name('debt.destroy');
    });
});
