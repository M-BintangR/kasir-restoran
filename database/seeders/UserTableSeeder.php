<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin =  User::create([
            'name' => 'Muhammad Bintang',
            'email' => 'muhbintang650@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('bintang123'),
        ]);

        $superadmin->assignRole('superadmin');

        $admin =  User::create([
            'name' => 'Fery Fadul Rahman',
            'email' => 'feryfadulrahman@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('fery123'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Wawan',
            'email' => 'wawan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('wawan123'),
        ]);

        $user->assignRole('user');
    }
}
