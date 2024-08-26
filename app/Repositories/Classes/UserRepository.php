<?php

namespace App\Repositories\Classes;

use App\Repositories\baseRepository;
use App\Models\User;

class UserRepository extends baseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
