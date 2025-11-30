<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $admin = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL')],
            [
                'name' => env('ADMIN_NAME'),
                'first_name' => env('ADMIN_FIRST_NAME'),
                'last_name' => env('ADMIN_LAST_NAME'),
                'password' => bcrypt(env('ADMIN_PASSWORD'))
            ]
        );

        $admin->assignRole('admin');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
=======
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);
>>>>>>> 20ab7d925bda222a85859dc1725baa9bb086913d
    }
}
