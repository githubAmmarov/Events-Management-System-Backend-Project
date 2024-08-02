<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository extends baseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
م