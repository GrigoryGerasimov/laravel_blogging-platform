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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable(false);
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('post_id', 'comment_post_idx');
            $table->index('user_id', 'comment_user_id');

            $table->foreign('post_id', 'comment_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropIndex('comment_post_idx');
            $table->dropIndex('comment_user_id');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comment_post_fk');
            $table->dropForeign('comment_user_fk');
        });
        Schema::dropIfExists('comments');
    }
};
