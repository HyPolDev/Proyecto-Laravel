<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition()
     {
         static $count = 0;
         $names = ['Marina', 'Ramiro'];
         $roleNames = ['Marina' => 2, 'Ramiro' => 3];

         if ($count < count($names)) {
             $name = $names[$count];
             $count++;
             return [
                 'userName' => $name,
                 'email' => strtolower($name) . $count . '@gmail.com', // Añade el contador al email para hacerlo único
                 'roleName' => $roleNames[$name],
                 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                 'remember_token' => Str::random(10),
             ];
         } else {
             return [
                 'userName' => fake()->name(),
                 'email' => fake()->unique()->safeEmail(),
                 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                 'remember_token' => Str::random(10),
             ];
         }
     }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    //////

    // public function unverified()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'email_verified_at' => null,
    //         ];
    //     });
    // }
}
