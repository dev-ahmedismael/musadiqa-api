<?php

namespace App\Repositories\Central\User;

use App\Models\Central\User\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User {
        return User::create($data);
    }
}
