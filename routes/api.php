<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('App\Http\Controllers\Api')->group(function () {
    Route::apiResource('/departments', DepartmentCotroller::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/request-lists', RequestListController::class);
    Route::apiResource('/leaves', LeaveController::class);
    Route::get('/mission', 'RequestListController@mission');
    Route::get('/leave/all/{id}', 'StatusController@index');
    Route::get('/mission/all/{id}', 'StatusController@mission');
    Route::get('/pending', 'StatusController@pending');
    Route::get('/approved', 'StatusController@approved');
    Route::get('/rejected', 'StatusController@rejected');
    Route::get('/user-departments', 'UserDepartmentController@index');
    Route::prefix('/users')->group(function () {
        Route::post('/departments', 'UserDepartmentController@assignUserToDepartments');
        Route::get('{id}/departments', 'UserDepartmentController@getUserDepartments');
        Route::delete('{id}/departments', 'UserDepartmentController@removeUserFromDepartments');
    });
});
