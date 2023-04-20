<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ResponseTrait;

use App\Http\Requests\ChReqeust;
use Illuminate\Http\JsonResponse;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;

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

// public function changePass(ChReqeust $request):JsonResponse
// {
//     try{
//         $data =  $this->auth->register($request->all()); 
//           return $this->responseSuccess($data, "User registered succesfuly");
//       }catch(Exception $exception){
//           return $this->responseError([],$exception->getMessage());
//       }
// }

}