<?php

namespace App\Http\Controllers;

use Exception;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;



class LoginController extends Controller
{

    use ResponseTrait;




    public function __construct(private AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function Login(LoginRequest $request): JsonResponse
    {

        try {
            $data =  $this->auth->Login($request->all());
            return $this->responseSuccess($data, "Login succesful");
        } catch (Exception $exception) {
            return $this->responseError([], $exception->getMessage());
        }
    }



}
