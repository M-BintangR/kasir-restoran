<?php

namespace Database\Seeders;

use App\Helpers\AppConst;
use App\Helpers\PermissionForRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (AppConst::PERMISSIONS as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superadmin = Role::whereName('superadmin')->first();
        $superadmin->givePermissionTo(PermissionForRole::SUPERADMIN);

        $admin = Role::whereName('admin')->first();
        $admin->givePermissionTo(PermissionForRole::ADMIN);
    }
}
