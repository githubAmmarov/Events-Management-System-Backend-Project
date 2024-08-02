<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\Response ;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('indexAvailablePlanners');
    }
    public function indexClients()
    {
        $clientUsers = [];
        try
        {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->hasRole('client'))
            array_push($clientUsers,$user);
        }
        return Response::Success($clientUsers,'these are all clients') ;
        }
        catch(Exception $th){
            $error = $th->getMessage();
            return Response::Error($th,$error,500);
        }
    }
    public function indexBlockedClients()
    {
        $clientUsers = [];
        try
        {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->hasRole('client') && $user->blocked == 1)
            array_push($clientUsers,$user);
        }
        return Response::Success($clientUsers,'these are blocked clients');
        }
        catch(Exception $th){
            $error = $th->getMessage();
            return Response::Error($th,$error,500);
        }
    }
    public function indexAvailablePlanners()
    {
        $plannersUsers = [];
        try
        {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->hasRole('planner') && $user->blocked == 0 )
            array_push($plannersUsers,$user);
        }
        return Response::Success($plannersUsers,'these are all available planners') ;
        }
        catch(Exception $th){
            $error = $th->getMessage();
            return Response::Error($th,$error,500);
        }
    }
    public function indexBannedPlanners()
    {
        $plannersUsers = [];
        try
        {
        $users = User::all();
        foreach($users as $user)
        {
            if($user->hasRole('planner') && $user->blocked == 1 )
            array_push($plannersUsers,$user);
        }
        return Response::Success($plannersUsers,'these are all banned planners') ;
        }
        catch(Exception $th){
            $error = $th->getMessage();
            return Response::Error($th,$error,500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(UserRegisterRequest $request)
    // {
    //     $user_data = $request->validated();
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $name = 'users/' . uniqid() . '.' . $file->extension();
    //         $file->storePubliclyAs('public', $name);
    //         $user_data['image'] = $name;
    //     }
    //     $user = User::create($user_data);
    //     return $this->showOne($user, UserResource::class, __('insert successfully'), 200);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(User $user)
    // {
    //     return new UserResource($user);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(updateUserRequests $request, User $user)
    // {
    //     $user_data = $request->validated();
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $name = 'users/' . uniqid() . '.' . $file->extension();
    //         $file->storePubliclyAs('public', $name);
    //         $user_data['image'] = $name;
    //     }
    //     $user->update($user_data);
    //     return $this->showOne($user, UserResource::class, __('update successfully'), 200);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return response(__('deleted successfully'), Response::HTTP_OK);
    // }
}
