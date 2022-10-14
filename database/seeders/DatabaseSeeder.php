<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(SectionTableSeeder::class);
        $this->command->info('Таблица разделов загружена данными!');

        $this->call(RoleTableSeeder::class);
        $this->command->info('Таблица ролей загружена данными!');

        $this->call(AuthorTableSeeder::class);
        $this->command->info('Таблица авторов загружена данными!');

        $this->call(ThemeTableSeeder::class);
        $this->command->info('Таблица тем загружена данными!');

        $this->call(PostTableSeeder::class);
        $this->command->info('Таблица постов загружена данными!');

        $this->call(CommentTableSeeder::class);
        $this->command->info('Таблица комментариев загружена данными!');

        $this->call(TagTableSeeder::class);
        $this->command->info('Таблица тегов загружена данными!');

        $this->call(PostTagTableSeeder::class);
        $this->command->info('Таблица связи пост-теги загружена данными!');
    }
}
