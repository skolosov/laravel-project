<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function register(Request $request): JsonResponse
    {
        $requestData = $request->all();
        $validator = Validator::make(
            $requestData,
            [
                'firstName' => 'required|string|max:55',
                'lastName' => 'required|string|max:55',
                'familyName' => 'required|string|max:55',
                'phone' => 'string',
                'email' => 'email|required|unique:users',
                'password' => 'required|string',

            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors()
                ],
                422
            );
        }

        $userData = [
            'name' => "{$requestData['lastName']} {$requestData['firstName']} {$requestData['familyName']}",
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ];

        User::query()->create($userData);

        return response()->json(['status' => true, 'message' => 'User successfully register.']);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return $this->exceptionUnauthorized();
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResponse
    {
        if (auth()->user()) {
            return response()->json(auth()->user());
        }
        return $this->exceptionUnauthorized();
    }

    public function logout(): JsonResponse
    {
        try {
            auth()->logout();

            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $exception) {
            return $this->exceptionUnauthorized($exception->getMessage());
        }
    }

    public function refresh(): JsonResponse
    {
        try {
            return $this->respondWithToken(auth()->refresh());
        } catch (\Exception $exception) {
            return $this->exceptionUnauthorized($exception->getMessage());
        }
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json(
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user(),
            ]
        );
    }

    protected function exceptionUnauthorized(?string $message = null): JsonResponse
    {
        return response()->json(['error' => 'Не авторизован', 'message' => $message], 401);
    }
}
