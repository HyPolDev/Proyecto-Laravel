<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;


class ChatFactory extends Factory
{
    protected $model = Chat::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description'=> $this->faker->sentence,
            'game_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
