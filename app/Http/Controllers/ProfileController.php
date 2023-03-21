<?php

namespace App\Http\Controllers;

use Exception;

use App\Traits\ResponseTrait;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{

    use ResponseTrait;




    public function __construct(private AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function show()
    {

$data = Auth::user();

return response()->json($data,200);



/*
        try {
            return Auth::guard()->user();
        } catch (Exception $exception) {
            return $this->responseError([], $exception->getMessage());
        }*/
    }

    public function logout():JsonResponse
    {

        try {

            Auth::guard()->user()->token()->revoke();
            Auth::guard()->user()->token()->delete();
            return $this->responseSuccess('', 'User logout success');
        } catch (Exception $exception) {
            return $this->responseError([], $exception->getMessage());
        }
    }
}
