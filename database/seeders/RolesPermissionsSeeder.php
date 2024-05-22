<?php

namespace Database\Seeders;

use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'client']);

        // permissions for users
        $permissions = [
            'delete_report', 'update_report', 'create_report', 'index_report'
        ];
        foreach ($permissions as $permissionName) {
            Permission::findOrCreate($permissionName, 'web');
        }
        $adminRole->syncPermissions($permissions); //delete old permissions and instead of those inside $permissions
        $clientRole->givePermissionTo(['create_report', 'index_report']); // add permissions for this roles addition to his old permissions


        $adminUser = User::factory()->create([
            'name' => 'admin user',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $adminUser->assignRole($adminRole);

        $permissions = $adminRole->permissions()->pluck('name')->toArray();
        $adminUser->givePermissionTo($permissions);


        $clientUser = User::factory()->create([
            'name' => 'admin user',
            'email' => 'admins@example.com',
            'password' => Hash::make('password'),
        ]);
        $clientUser->assignRole($adminRole);

        $permissions = $clientRole->permissions()->pluck('name')->toArray();
        $clientUser->givePermissionTo($permissions);
        }
}
