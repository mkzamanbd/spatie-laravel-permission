<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total_users = 10;
        $admin_email = 'admin@spatie.com';

        $defined_emails = [
            $admin_email
        ];

        foreach ($defined_emails as $email) {
            if (User::whereEmail($email)->first()){
                continue;
            }

            if ($email === $admin_email){
                factory(User::class)
                    ->create([
                        'email' => $email,
                    ]);
            }

            $total_users--;
        }

        factory(User::class, $total_users)->create();
    }
}
