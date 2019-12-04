<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'password' => bcrypt('P+yXk4!Q3M9QDhR+'),
        ];

        User::firstOrCreate([
            'email' => $user['email']
        ], $user);

    }

}
