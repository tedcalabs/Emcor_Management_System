<?php

use App\Http\Controllers\Api\V1\InforController;
use App\Http\Controllers\Api\V1\RepairController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Secretary\MaintenanceController;


Route::post('login', [LoginController::class, 'Login']);

Route::post('register', [RegisterController::class, 'register']);

Route::post('mreqs', [MaintenanceController::class, 'store']);

Route::get('mreqs', [MaintenanceController::class, 'index']);

Route::post('maintenance/{id}', [RepairController::class, 'update']);

Route::post('upload', [RepairController::class, 'upload']);

Route::middleware('auth:api')->group(function () {
    Route::get('profile', [ProfileController::class, 'show']);
    Route::post('logout', [ProfileController::class, 'logout']);
    Route::post('change-password', [InforController::class, 'change_password']);
    Route::post('change-phone', [InforController::class, 'updatePhone']);
    Route::get('ment', [RepairController::class, 'getMaintenanceByUserDeviceToken']);
    Route::post('mreqs', [MaintenanceController::class, 'store']);


});

Route::group(['namespace' => 'Api\V1'], function () {

    Route::group(['prefix' => 'services'], function () {

        //Route::put('maintenance/{id}', [RepairController::class, 'update']);
        Route::get('popular', 'ServiceController@get_popular_services');
        Route::get('whitelines', 'ServiceController@get_whitelines_services');
        Route::get('brownlines', 'ServiceController@get_brownlines_services');
        Route::get('mechanic', 'ServiceController@get_mechanic_services');
    });

    Route::group(['prefix' => 'config'], function () {
        Route::get('geocode-api', 'ConfigController@geocode_api');
    });
});
