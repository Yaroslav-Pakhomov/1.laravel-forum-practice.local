<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const TABLE = 'authors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->id();

            $table->string('avatar', 100);
            $table->string('name', 30);
            $table->string('login', 30)->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->unsignedBigInteger('role_id')->nullable();

            $table->softDeletes();

            $table->timestamps();

            // IDx
            $table->index('role_id');

            // FK
            // $table->foreign('role_id')->on('roles')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
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
