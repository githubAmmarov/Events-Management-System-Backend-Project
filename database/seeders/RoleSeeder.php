<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Roles=['planner','customer'];
        foreach($Roles as $Role)
        {
            Role::create(['user_role'=>$Role]);
        }
    }
}
