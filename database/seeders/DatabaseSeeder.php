<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(40)->create();
        \App\Models\Game::factory(20)->create();
        \App\Models\Chat::factory(15)->create();
        \App\Models\Message::factory(20)->create();
    }
}
