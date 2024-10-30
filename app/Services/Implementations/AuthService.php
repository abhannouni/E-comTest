<?php

namespace App\Services\Implementations;

use App\Repositories\Specifications\IUserRepository;
use App\Services\Specifications\IAuthService;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService implements IAuthService
{
    private IUserRepository $iUserRepository;

    public function __construct(protected IUserRepository $userRepository)
    {
        $this->iUserRepository = $userRepository;
    }

    public function register(array $data)
    {
        try {
            return $this->iUserRepository->store($data);
        } catch (Exception $e) {
            Log::error('An error occurred while registering a new user: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }

    public function login(array $data)
    {
        try {
            $user = $this->iUserRepository->findByEmail($data['email']);

            if (!$user || !Hash::check($data['password'], $user->password)) return null;

            return $user->createToken($user->name . '-AuthToken')->plainTextToken;
        } catch (Exception $e) {
            Log::error('An error occurred while login: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
    }
}
