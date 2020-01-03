<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // default permission
        $defaultPerms = [
            'list', 'view', 'update', 'store', 'delete'
        ];

        $models = [
            'setting'
        ];

        foreach ($defaultPerms as $value) {
            foreach ($models as $model) {
                $name = [
                    'name' => "{$value}_{$model}",
                    'display_name' => ucwords("{$value} {$model}"),
                ];
                // create permission
                Permission::create($name);
            }
        }

        // Create role
        $hrd = Role::create(['name' => 'hrd', 'display_name' => 'HRD']);
        $admin = Role::create(['name' => 'admin', 'display_name' => 'Admin']);

        // Assign permission to role
        $admin->givePermissionTo(Permission::all());
        $hrd->givePermissionTo([
            'list_setting',
            'view_setting',
            'update_setting',
            'store_setting',
            'delete_setting'
        ]);

        // Assign role to user
        $user = User::where('email', 'administrator@aiia.co.id')->first();
        $user->assignRole('admin');

        $user = User::where('email', 'hrd@aiia.co.id')->first();
        $user->assignRole('hrd');
    }
}
