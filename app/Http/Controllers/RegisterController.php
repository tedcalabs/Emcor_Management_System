<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use App\Traits\ResponseTrait;
use App\Repositories\AuthRepository;
use Exception;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{

    use ResponseTrait;




    public function __construct(private AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function register(RegisterRequest $request):JsonResponse
    {

        try{
          $data =  $this->auth->register($request->all()); 
            return $this->responseSuccess($data, "User registered succesfuly");
        }catch(Exception $exception){
            return $this->responseError([],$exception->getMessage());
        }
    }


}
