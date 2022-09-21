<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TABLE = 'posts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table(self::TABLE, static function (Blueprint $table) {
            // FK
            $table->foreign('author_id')->on('authors')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('theme_id')->on('themes')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table(self::TABLE, static function (Blueprint $table) {
            $table->dropForeign('posts_author_id_foreign');
            $table->dropForeign('posts_theme_id_foreign');
        });
    }
};
