<?php

namespace Database\Factories;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    #[ArrayShape(
        [ 'avatar'     => "string",
          'name'       => "string",
          'login'      => "string",
          'email'      => "string",
          'password'   => "string",
          'role_id'    => "int",
          'created_at' => DateTime::class,
          'updated_at' => DateTime::class ]
    )]
    public function definition(): array
    {
        return [
            'avatar'   => fake()->imageUrl(120, 120, 'animals', TRUE),
            'name'     => fake()->name(),
            'login'    => fake()->unique()->userName(),
            'email'    => fake()->unique()->email(),
            'password' => fake()->password(),

            'role_id' => random_int(2, 3),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),

        ];
    }
}
