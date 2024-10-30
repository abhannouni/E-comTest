<?php

namespace App\Services\Specifications;

interface IAuthService
{
    public function register(array $data);

    public function login(array $data);

    public function logout();
}
