<?php
namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'gameName' => $this->faker->word,
            'description' => $this->faker->sentence,
            'urlImg' => 'https://via.placeholder.com/150',
        ];
    }
}

// GamesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        Game::factory()->count(10)->create();
    }
}
