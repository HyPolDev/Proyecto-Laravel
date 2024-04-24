<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'userName' => "marina",
            'email' => "marina@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'roleName' => 2,
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            // 'name' => 'Test User',
            // 'email' => 'test@example.com',
            'userName' => "ramiro",
            'email' => "ramiro@gmail.com",
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'roleName' => 3,
            'remember_token' => Str::random(10),
        ]);
    }
}
