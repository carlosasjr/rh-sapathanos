<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\v1\EmployeeController;
use App\Http\Controllers\Api\v1\EmployeeEmailControler;
use App\Http\Controllers\Api\v1\EmployeeFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'me']);


Route::group([
    'prefix' => 'v1',
    'middleware' => 'jwt.auth'
], function () {
    Route::get('employee-file/{employee}', EmployeeFileController::class);
    Route::get('employee-sendmail', EmployeeEmailControler::class);
    Route::apiResource('employees', EmployeeController::class);
});

