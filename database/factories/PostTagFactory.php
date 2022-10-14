<?php

namespace Database\Factories;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    #[ArrayShape(
        [ 'post_id'    => "int",
          'tag_id'     => "int",
          'created_at' => DateTime::class,
          'updated_at' => DateTime::class ]
    )]
    public function definition(): array
    {
        return [
            'post_id' => random_int(1, 1250),
            'tag_id'  => random_int(1, 2500),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
