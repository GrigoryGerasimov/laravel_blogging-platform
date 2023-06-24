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
        Schema::create('post_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->timestamps();

            $table->index('user_id', 'post_user_user_idx');
            $table->index('post_id', 'post_user_post_idx');

            $table->foreign('user_id', 'post_user_user_fk')->on('users')->references('id');
            $table->foreign('post_id', 'post_user_post_fk')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_users');
    }
};
