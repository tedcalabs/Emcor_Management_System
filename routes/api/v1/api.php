<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Secretary\MaintenanceController;






Route::post('login', [LoginController::class, 'Login']);

Route::post('register', [RegisterController::class, 'register']);

Route::post('mreqs', [MaintenanceController::class, 'store']);

Route::get('mreqs', [MaintenanceController::class, 'index']);


Route::middleware('auth:api')->group(function () {
    Route::get('profile', [ProfileController::class, 'show']);
    //Route::get('Uinfo', [ProfileController::class, 'info']);
    Route::post('logout', [ProfileController::class, 'logout']);
});






Route::group(['namespace' => 'Api\V1'], function () {

    Route::group(['prefix' => 'services'], function () {
        Route::get('popular', 'ServiceController@get_popular_services');
        Route::get('whitelines', 'ServiceController@get_whitelines_services');
        Route::get('brownlines', 'ServiceController@get_brownlines_services');
        Route::get('mechanic', 'ServiceController@get_mechanic_services');
    });

    Route::group(['prefix' => 'config'], function () {
        //Route::get('/', 'ConfigController@configuration');
        //Route::get('/get-zone-id', 'ConfigController@get_zone');
        //Route::get('place-api-autocomplete', 'ConfigController@place_api_autocomplete');
        // Route::get('distance-api', 'ConfigController@distance_api');
        //Route::get('place-api-details', 'ConfigController@place_api_details');
        Route::get('geocode-api', 'ConfigController@geocode_api');
    });
});
