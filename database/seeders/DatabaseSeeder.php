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
    public function run()
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mas Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Mas Admin',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Owner',
        ]);

        User::factory()->create([
            'name' => 'Bang Kurir',
            'email' => 'kurir@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'Courier',
        ]);
    }
}
