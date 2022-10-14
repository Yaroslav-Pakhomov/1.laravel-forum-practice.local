<?php

declare(strict_types=1);

namespace Database\Factories;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    #[ArrayShape(
        [ 'title'      => "string",
          'created_at' => DateTime::class,
          'updated_at' => DateTime::class ]
    )]
    public function definition(): array
    {
        return [
            'title' => fake()->realText(random_int(25, 30)),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
