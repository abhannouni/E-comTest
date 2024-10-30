<?php

namespace App\Repositories\Specifications;

interface IUserRepository
{
    /**
     * Stores a new user.
     */
    public function store(array $data);

    /**
     * finds a user by its mail
     */
    public function findByEmail($email);
}
