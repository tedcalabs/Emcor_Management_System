<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use App\Traits\ResponseTrait;
use App\Repositories\AuthRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
class RegisterController extends Controller
{

    use ResponseTrait;




    public function __construct(private AuthRepository $auth)
    {
        $this->auth = $auth;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $this->auth->register($request->all());
            return $this->responseSuccess($data, "User registered successfully");
        } catch (Exception $exception) {
            $errorMessage = "An error occurred during user registration."; // Customize the error message as needed
    
            return response()->json([
                'status' => false,
                'message' => $errorMessage,
                'data' => null,
                'errors' => [$exception->getMessage()]
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }


}
