<?php

namespace App\Services\Central\User;

use App\Repositories\Central\User\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $user_repository;

    public function __construct(UserRepositoryInterface $user_repository) {
        $this->user_repository = $user_repository;
    }

    public function create_user(array $data)
    {
        return $this->user_repository->create($data);
    }

    public function login(array $credentials) {
        $token = auth()->attempt($credentials);

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $token;
    }
}
