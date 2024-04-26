<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;


class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'text' => $this->faker->sentence,
            'user_id' => $this->faker->numberBetween(1, 10),
            'chat_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
