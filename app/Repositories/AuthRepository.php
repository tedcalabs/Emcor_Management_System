<?php

namespace App\Repositories;

use Exception;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Sanctum\PersonalAccessToken;

class AuthRepository
{

    public function login(array $data): array
    {
        //check the request if valid email
        $user = $this->getUserByEmail($data['email']);
        if (!$user) {
            throw new Exception("Sorry, user does not exist", 404);
        }



        if ($this->isValidPassword($user, $data)) {


            $tokenInstance = $this->createAuthToken($user);

            return $this->getAuthData($user, $tokenInstance);

            //    throw new Exception("Sorry, password doesnt match", 401);
        }
    }



    public function register(array $data): array
    {
        //check the request if valid email
        $user = user::create($this->prepareDataForRegister($data));

        if (!$user) {
            throw new Exception("Sorry, user does not registered, Please try again", 500);
        }


        $tokenInstance = $this->createAuthToken($user);

        return $this->getAuthData($user, $tokenInstance);
    }



    public function getUserByEmail(string $email): ?User
    {
        return  User::where('email', $email)->first();
    }
    public function isValidPassword(User $user, array $data): bool
    {
        return Hash::check($data['password'], $user->password);
    }

    public function createAuthToken(User $user): PersonalAccessTokenResult
    {
        return $user->createToken('authToken');
    }

    public function getAuthData(User $user, PersonalAccessTokenResult $tokenInstance)
    {
        return [
            'user' => $user,
            'token' => $tokenInstance->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenInstance->token->expires_at)->toDayDateTimeString()
        ];
    }


    public function prepareDataForRegister(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ];
    }
}
