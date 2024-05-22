<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function  register($request):array
    {
        $user = User::query()->create([

            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),
            'role_id'=> 2,
        ]);
        // $clientRole = Role::query()->where('name','client')->first();
        // $user->assignRole($clientRole);

        // $permissions = $clientRole->permissions()->pluck('name')->toArray();
        // $user->givePermissionTo($permissions);

        // $user->load('roles','permissions');

        $user= User::query()->find($user['id']);
        // $user= $this->appendRolesAndPermissions($user);
        $user['token'] = $user->createToken("bilal")->accessToken;

        $message = 'user created successfully';
        return ['user' => $user , 'message' => $message];
    }
    public function  login($request):array
    {
        $user = User::query()
            ->where('email',$request['email'])
            ->first();

        if (!is_null($user)) {
            if (!Auth::attempt($request)) {
                $message = 'Email Or Password Is Not Valid';
                $status = 401;
            } else {
                // $user = $this->appendRolesAndPermissions($user);
                $user['token'] = $user->createToken("bilal")->accessToken;
                $message = 'user logged in successfully';
                $status = 200;
            }
        }else{
            $message = 'invalid Token';
            $status = 404;
        }
        return ['user' => $user , 'message' => $message , 'status'=>$status];
    }
    
    public function logout():array
    {
            $user = Auth::user();
            $user->tokens()->delete();
            $message = 'user logged out successfully';
            $status = 200;
        
        return ['user' => $user , 'message' => $message , 'status' => $status];
    }

    private function appendRolesAndPermissions($user)
    {
        $roles = [];
        foreach ($user->roles as $role){
            $roles[] = $role->name;
        }
        unset($user['roles']);
        $user['roles'] = $roles;
        $permissions = [];
        foreach ($user->permissions as $permission){
            $permissions[] = $permission->name;
        }
        unset($user['permissions']);
        $user['permissions'] = $permissions;

        return $user;

    }
}
