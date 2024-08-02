<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Responses\Response;
use App\Services\ClassServices\UserService;
use Illuminate\Http\JsonResponse;
use Throwable;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $data = [];
        try {
            $data = $this->userService->register($request->validated());
            return Response::Success($data['user'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }

    public function registerAsPlanner(UserRegisterRequest $request): JsonResponse
    {
        $data = [];
        try {
            $data = $this->userService->registerAsPlanner($request->validated());
            return Response::Success($data['user'], $data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }
    public function login(UserLoginRequest $request){
        $data = [];
        try {
            $data = $this->userService->login($request->validated());
            return Response::Success($data['user'],$data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }
    public function Adminlogin(UserLoginRequest $request){
        $data = [];
        try {
            $data = $this->userService->Adminlogin($request->validated());
            return Response::Success($data['user'],$data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }

    public function profile_Info($id){
        $data = [];
        try{
            $data = $this->userService->profile_Info($id);
            return Response::Success($data['user'],$data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }
    public function logout(){
        $data = [];
        $user=auth()->user();
        try {
            $data = $this->userService->logout($user);
            return Response::Success($data['user'],$data['message']);
        } catch (Throwable $th) {
            $message = $th->getMessage();
            return Response::Error($data, $message);
        }
    }


}

