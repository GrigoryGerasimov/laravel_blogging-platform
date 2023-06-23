<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->timestamps();

            $table->index('post_id', 'p_u_l_post_idx');
            $table->index('user_id', 'p_u_l_user_idx');

            $table->foreign('post_id', 'p_u_l_post_fk')->on('posts')->references('id');
            $table->foreign('user_id', 'p_u_l_user_fk')->on('users')->references('íd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_user_likes', function (Blueprint $table) {
            $table->dropIndex('p_u_l_post_idx');
            $table->dropIndex('p_u_l_user_idx');
        });
        Schema::table('post_user_likes', function (Blueprint $table) {
            $table->dropForeign('p_u_l_post_fk');
            $table->dropForeign('p_u_l_user_fk');
        });
        Schema::dropIfExists('post_user_likes');
    }
};
