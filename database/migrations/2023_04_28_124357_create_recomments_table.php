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
        Schema::create('recomments', function (Blueprint $table) {
            $table->id();
            $table->string('recomment');
            $table->foreignId('user_id')->constrained('users')->deafault(0);
            $table->foreignId('post_id')->constrained('posts')->deafault(0);
            $table->foreignId('postcomment_id')->constrained('post_comments');  
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomments');
    }
};