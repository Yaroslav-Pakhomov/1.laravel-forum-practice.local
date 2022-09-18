<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('comments', static function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->text('content');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // IDx
            $table->index('author_id', 'comment_author_idx');
            $table->index('post_id', 'comment_post_idx');

            //FK
            $table->foreign('author_id', 'comment_author_fk')->on('authors')->references('id')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('post_id', 'comment_post_fk')->on('posts')->references('id')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
