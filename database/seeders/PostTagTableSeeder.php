<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PostTag::factory(2500)->create();
    }
}
