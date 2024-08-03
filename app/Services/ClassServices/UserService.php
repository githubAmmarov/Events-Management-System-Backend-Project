<?php

namespace App\Services\ClassServices;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Permission\Models\Role;

class UserService
{
    public function  register($request):array
    {
        $user = User::query()->create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),
        ]);
        $clientRole = Role::query()->where('name','client')->first();
        $user->assignRole($clientRole);

        // Assign permissions associated with the role to the user
        $permissions = $clientRole->permissions()->pluck('name')->toArray();
        $user->givePermissionTo($permissions);

        // Load the user's roles and permissions
        $user->load('roles','permissions');

        // Reload the user instance to get updated roles and permissions
        $user= User::query()->find($user['id']);
        $user= $this->appendRolesAndPermissions($user);
        $user['token'] = $user->createToken("PassportToken")->accessToken;

        // $qrCode = QrCode::format('png')->size(200)->generate($user->id);
        // $qrCodePath = 'qrcodes/user_'.$user->id.'.png';
        // Storage::disk('public')->put($qrCodePath,$qrCode);
        // $user->qr_code_path = $qrCodePath;

        $message = 'user created successfully';
        return ['user' => $user , 'message' => $message];
    }
    public function registerAsPlanner($request):array
    {
        $user = User::query()->create([

            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),
            'blocked'=> 1,
        ]);

        // {

        // ||==============================================================================||
        // ||this block of code will be put in admin's function (givePermissionToPlanner())||
        // ||==============================================================================||


        // // Assign permissions associated with the role to the user
        // $permissions = $plannerRole->permissions()->pluck('name')->toArray();
        // $user->givePermissionTo($permissions);

        // // Load the user's roles and permissions
        // $user->load('roles','permissions');

        // // Reload the user instance to get updated roles and permissions
        // $user= User::query()->find($user['id']);
        //
        // $permissions = [];
        // foreach ($user->permissions as $permission){
        //     $permissions[] = $permission->name;
        // }
        // unset($user['permissions']);
        // $user['permissions'] = $permissions;

        // }

        $plannerRole = Role::query()->where('name','planner')->first();
        $user->assignRole($plannerRole);


        $user= User::query()->find($user['id']);
        $roles = [];
        foreach ($user->roles as $role){
            $roles[] = $role->name;
        }
        unset($user['roles']);
        $user['roles'] = $roles;


        $user['token'] = $user->createToken("PassportToken")->accessToken;

        $message = "waiting for admin's permission";
        return ['user' => $user , 'message' => $message];
    }

    public function login($request):array
    {
        $user = User::query()
            ->where('email',$request['email'])
            ->first();

        if (!is_null($user)) {
            if (!Auth::attempt($request)) {
                $message = 'Email Or Password Is Not Valid';
                $status = 401;
            }
            elseif($user['blocked']==1) {
                $message = 'your account is blocked';
                $status = 401;
            }

            else {
                $user = $this->appendRolesAndPermissions($user);
                $user['token'] = $user->createToken("PassportToken")->accessToken;
                $message = 'user logged in successfully';
                $status = 200;
            }
        }
        else{
            $message = 'invalid Token';
            $status = 404;
        }
        return ['user' => $user , 'message' => $message , 'status'=>$status];
    }
    public function Adminlogin($request):array
    {
        $user = User::query()
            ->where('email',$request['email'])
            ->first();

        if (!is_null($user)) {
            if (!Auth::attempt($request) || $request['email'] != 'Admin@example.com') {
                $message = 'You are not the admin';
                $status = 401;
            }
            else {
                $user = $this->appendRolesAndPermissions($user);
                $user['token'] = $user->createToken("PassportToken")->accessToken;
                $message = 'Hello Admin';
                $status = 200;
            }
        }
        else{
            $message = 'invalid Token';
            $status = 404;
        }
        return ['user' => $user , 'message' => $message , 'status'=>$status];
    }
    public function profile_Info($id)
    {
        $user = Auth::user();

        $user = User::query()->findOrFail($id);
        $mesaage = "This is the $id th User's Profile Info ";
        $status = 200;

        return ['user'=> $user , 'message'=> $mesaage , 'status' => $status ];

    }

    public function logout():array
    {
            $user = Auth::user();
            if (!is_null(Auth::user()))
            {
                $user->tokens()->delete();

                $message = 'user logged out successfully';

                $status = 200;
            }else{
                $message = 'invalid token';
                $code = 404;
            }
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
