<?php

namespace Database\Factories;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    #[ArrayShape(
        [ 'title'      => "string",
          'content'    => "string",
          'author_id'  => "int",
          'post_id'    => "int",
          'created_at' => DateTime::class,
          'updated_at' => DateTime::class ]
    )]
    public function definition(): array
    {
        return [
            'title'   => fake()->realText(random_int(15, 20)),
            'content' => fake()->realText(random_int(10, 50)),

            'author_id' => random_int(1, 5),
            'post_id'   => random_int(1, 250),

            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
