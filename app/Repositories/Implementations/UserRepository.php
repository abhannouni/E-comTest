<?php

namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\Specifications\IUserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements IUserRepository
{
    public function store(array $data)
    {
        try {
            $data['password'] = Hash::make($data['password']);
            return User::create($data);
        } catch (Exception $e) {
            Log::error('an error occured while creating a new user: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }

    public function findByEmail($email)
    {
        try {
            return User::where('email', $email)->first();
        } catch (Exception $e) {
            Log::error('an error occured while searching for user by email: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
