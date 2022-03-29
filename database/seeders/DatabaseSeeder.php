<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'	=> 'Admin1',
            'username' => 'admin',
            'email'	=> 'admin@gmail.com',
            'password'	=> bcrypt('12345'),
            'role' => 'Admin'

    ]);
    }
}
