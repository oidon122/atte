<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AttendanceController;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/work');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-nontification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification Link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/profile', function () {})->middleware(['auth', 'verified']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware('verified')->group(function () {
    Route::get('/', function () { return redirect('/work');});
    Route::get('/work', [AttendanceController::class, 'index']);
    Route::post('/work/start', [AttendanceController::class,'startWork']);
    Route::post('/work/end', [AttendanceController::class, 'endWork']);

    Route::post('/rest/start', [AttendanceController::class, 'startRest']);
    Route::post('/rest/end', [AttendanceController::class, 'endRest']);
    Route::get('/attendance', [AttendanceController::class, 'getAttendance']);
    Route::get('/select/date', [AttendanceController::class, 'selectDate']);
});
