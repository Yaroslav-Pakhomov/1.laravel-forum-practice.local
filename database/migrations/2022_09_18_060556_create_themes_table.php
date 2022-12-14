<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TABLE = 'themes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->id();

            $table->string('title', 255);
            $table->string('slug', 100)->unique();

            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();

            $table->softDeletes();

            $table->timestamps();

            // IDx
            $table->index('author_id');
            $table->index('section_id');

            //FK
            // $table->foreign('author_id','theme_author_fk')->on('authors')->references('id')->cascadeOnUpdate()->nullOnDelete();
            // $table->foreign('section_id','theme_section_fk')->on('sections')->references('id')->cascadeOnUpdate()->nullOnDelete();
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
