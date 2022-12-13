<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'temansemarang@gmail.com',
            'password' => bcrypt('11111111'),
            'is_admin' => 1,
            'email_verified_at' => '2022-11-28 20:46:04'
        ]);
    }
}
