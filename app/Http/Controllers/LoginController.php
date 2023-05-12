<?php

namespace App\Http\Controllers;

use Exception;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Response;


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
            $data = $this->auth->Login($request->all());
            return $this->responseSuccess($data, "Login successful");
        } catch (Exception $exception) {
            $errorMessage = "An error occurred during login."; // Customize the error message as needed
    
            return response()->json([
                'status' => false,
                'message' => $errorMessage,
                'data' => null,
                'errors' => [$exception->getMessage()]
            ])->setStatusCode(Response::HTTP_BAD_REQUEST)->setStatusCode(Response::HTTP_BAD_REQUEST, 'Wrong phone or password!  Please try again.');
        }
    }


}
