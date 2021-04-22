<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MenuSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            AssignRolePermissionSeeder::class
        ]);

        // $user = new \App\Models\User();
        // $user->name = 'Mr Zaman';
        // $user->email = 'admin@mzmms.com';
        // $user->password = bcrypt('12345678');
        // $user->save();

        // factory(\App\Models\User::class, 10)->create();


    }
}
