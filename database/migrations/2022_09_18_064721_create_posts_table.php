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
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('content');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // IDx
            $table->index('author_id');
            $table->index('theme_id');

            //FK
            // $table->foreign('author_id', 'post_author_fk')->on('authors')->references('id')->cascadeOnUpdate()->nullOnDelete();
            // $table->foreign('theme_id', 'post_theme_fk')->on('themes')->references('id')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
