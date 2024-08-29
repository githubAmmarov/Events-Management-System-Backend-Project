<?php

namespace App\Repositories\Classes;

use App\Http\Responses\Response;
use App\Repositories\baseRepository;
use App\Models\User;
use Exception;

class UserRepository extends baseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function index()
    {
        $users = User::with('media')->get();
        $message = 'these are all users';
        try {
            return Response::Success($users,$message);
        } catch (Exception $e) {
            $error = "Failed to retrieve users." ;
            return Response::Error($error, $e , 500);
        }
    }
}
