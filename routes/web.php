<?php

use App\Http\Controllers\Admin\ClassController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

//__Route for Class CRUD PART__//
Route::get('class', [ClassController::class, 'index'])->name('class.index');
Route::get('create/class', [ClassController::class, 'create'])->name('create.class');
Route::post('store/class', [ClassController::class, 'store'])->name('store.class');
Route::get('class/delete/{id}', [ClassController::class, 'destroy'])->name('class.delete');
//__Route for Class CRUD PART__//

Auth::routes();

//__Route for Email Verification__//
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//__Route for resend verification__//
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/deposit/money', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit.money')->middleware('verified');
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change')->middleware('verified');
Route::post('/password/change', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware('verified');

//__Route for display verification page__//
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::get('/home/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('user.details');

Route::post('/store/user', [App\Http\Controllers\HomeController::class, 'store'])->name('store.user');

