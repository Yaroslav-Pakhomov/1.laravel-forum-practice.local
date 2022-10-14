<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Author::factory(5)->create();
    }
}
