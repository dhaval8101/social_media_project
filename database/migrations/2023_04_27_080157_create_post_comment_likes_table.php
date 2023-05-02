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
        Schema::create('post_comment_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->deafault(0);
            $table->foreignId('post_id')->constrained('posts')->deafault(0);
            $table->foreignId('postcomment_id')->nullable()->constrained('post_comments');

            $table->boolean('like');
            $table->boolean('dislike');
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_comment_likes');
    }
};