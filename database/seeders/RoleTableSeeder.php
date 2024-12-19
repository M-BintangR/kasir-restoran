<?php

namespace Database\Seeders;

use App\Helpers\AppConst;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (AppConst::ROLES as $role) {
            Role::create(['name' => $role]);
        }
    }
}
