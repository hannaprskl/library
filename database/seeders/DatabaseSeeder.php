<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        

        user::table('users')->insert([
            'name' => 'Sistem Informasi',
            'email' => 'sisteminformasi@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        
    }
}
