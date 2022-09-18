<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('post_tags', static function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            $table->softDeletes();

            // IDx
            $table->index('post_id');
            $table->index('tag_id');

            // FK
            $table->foreign('post_id')->on('posts')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('tag_id')->on('tags')->references('id')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};
