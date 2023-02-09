<?php
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

Route::group(['namespace' => 'Api\V1'], function () {
    

    
/*
http://127.0.0.1:8000/App/Http/Controllers/api/v1/services/popular
*/

       Route::group(['prefix' => 'services'], function () {
        Route::get('popular', 'ServiceController@get_popular_services');
       
    }); 

}); 