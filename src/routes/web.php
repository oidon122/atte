<?php

use Illuminate\Support\Facades\Route;
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

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/work', [AttendanceController::class, 'index']);
    Route::post('/work/start', [AttendanceController::class,'startWork']);
    Route::post('/work/end', [AttendanceController::class, 'endWork']);

    Route::post('/rest/start', [AttendanceController::class, 'startRest']);
    Route::post('/rest/end', [AttendanceController::class, 'endRest']);
});
