<?php

namespace Database\Factories;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */

    #[ArrayShape(
        [ 'title'      => "string",
          'slug'       => "string",
          'author_id'  => "int",
          'section_id' => "int",
          'created_at' => DateTime::class,
          'updated_at' => DateTime::class ]
    )]
    public function definition(): array
    {
        return [
            'title' => fake()->realText(random_int(25, 30)),
            'slug'  => fake()->unique()->slug(5, FALSE),

            'author_id'  => random_int(1, 5),
            'section_id' => random_int(1, 4),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
