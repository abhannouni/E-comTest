<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Specifications\IAuthService;

class AuthController extends Controller
{
    private IAuthService $iAuthService;

    public function __construct(protected IAuthService $authService)
    {
        $this->iAuthService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->iAuthService->register($request->all());

        return response()->json([
            'user' => $user
        ]);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->iAuthService->login($request->all());
        return $token
            ? response()->json(['token' => $token])
            : response()->json(['message' => 'Invalid Credentials']);
    }

    public function logout()
    {
        $this->iAuthService->logout();

        return response()->json([
            'message' => 'logged out'
        ]);
    }
}
