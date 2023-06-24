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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->longText('content')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('preview_img')->nullable();
            $table->string('main_img')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id', 'post_category_idx');
            $table->index('user_id', 'post_user_idx');

            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id');
            $table->foreign('user_id', 'post_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropIndex('post_category_idx');
            $table->dropForeign('post_category_fk');
        });
        Schema::dropIfExists('posts');
    }
};
