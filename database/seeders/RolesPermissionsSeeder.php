<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $adminrole=Role::create(['name'=>'admin']);
        $clientrole=Role::create(['name'=>'client']);

        // Define Permissions
        $permissions= [
            'delete_hall',
            'update_hall',
            'create_hall',
            'index_hall'
        ];
        foreach($permissions as $permissionName)
        {
            Permission::findOrCreate($permissionName,'web');
        }

        // Assign permissions to roles
        $adminrole->syncPermissions($permissions); // delete old permissions and keep those inside the $permissions
        $clientrole->givePermissionTo(['index_hall']); // add permissions on top of old ones

        $adminuser=\App\Models\User::factory()->create([
            "name" => 'Admin User',
            'email' => 'Admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminuser->assignRole($adminrole);

        // Assign permissions associated with the role to the user 
        $permissions = $adminrole->permissions()->pluck('name')->toArray();
        $adminuser->givePermissionTo($permissions);

        $clientuser=\App\Models\User::factory()->create([
            'name' => 'Client User',
            'email' => 'Client@example.com',
            'password' => bcrypt('password'),
        ]);
        $clientuser->assignRole($clientrole);

        // Assign permissions associated with the role to the user 
        $permissions = $clientrole->permissions()->pluck('name')->toArray();
        $clientuser->givePermissionTo($permissions);

    }
}
