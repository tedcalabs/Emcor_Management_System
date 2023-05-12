<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\CentralLogic\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Grimzy\LaravelMysqlSpatial\Types\Point;
class ConfigController extends Controller
{
    public function geocode_api(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
        ]);

        if ($validator->errors()->count()>0) {
            return response()->json(['errors' => Helpers::error_processor($validator)], 403);
        }
       
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$request->lat.','.$request->lng.'&key='."AIzaSyB9KXdhJlUchI-dZI4FAEMlM0li0dnWals");
        return $response->json();
    }

}
