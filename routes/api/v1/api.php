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
    Route::post('logout', [ProfileController::class, 'logout']);
});






Route::group(['namespace' => 'Api\V1'], function () {



    /*
http://127.0.0.1:8000/App/Http/Controllers/api/v1/services/popular
*/

    Route::group(['prefix' => 'services'], function () {
        Route::get('popular', 'ServiceController@get_popular_services');
        Route::get('recommended', 'ServiceController@get_recommended_services');
    });

    //registration & login


});


/*
Route::group(['namespace' => 'Auth'], function () {



  

    Route::group(['prefix' => 'services'], function () {
        Route::post('register', 'RegisteredUserController@store');
        Route::post('login', 'AuthenticatedSessionController@store');
    });

    //registration & login


});
*/



//Route::middleware('auth:api')->group(function () {
   // Route::get('popular', 'ServiceController@get_popular_services');
 
//});