<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('post_likes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->default();
                $table->foreignId('post_id')->constrained('posts')->default();
                $table->boolean('is_like')->default(0);
                $table->boolean('is_dislike')->default(0);
                $table->timestamps();
                $table->softDeletes();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_likes');
    }
};