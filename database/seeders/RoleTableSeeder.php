<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('roles')->insert([
           [
               'title' => 'admin',
               'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
               'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
           ],
           [
               'title' => 'registered',
               'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
               'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
           ],
           [
               'title' => 'guest',
               'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
               'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
           ],
       ]);
    }
}
