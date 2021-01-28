<?php

namespace Database\Seeders;

use http\Client\Curl\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $admin_role=Role::create(['name'=>'super-admin']);

        $user=\App\Models\User::factory()->create([
            'name'=>'Administrador',
            'email'=>'admin@clinica.com'
        ]);

        $user->assignRole($admin_role);
    }
}
