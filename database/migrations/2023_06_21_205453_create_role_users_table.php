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
        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->timestamps();

            $table->index('user_id', 'role_user_user_idx');
            $table->index('role_id', 'role_user_role_idx');

            $table->foreign('user_id', 'role_user_user_fk')->on('users')->references('id');
            $table->foreign('role_id', 'role_user_role_fk')->on('roles')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_users', function (Blueprint $table) {
            $table->dropIndex('role_user_user_idx');
            $table->dropIndex('role_user_role_idx');
        });
        Schema::table('role_users', function (Blueprint $table) {
            $table->dropForeign('role_user_user_fk');
            $table->dropForeign('role_user_role_fk');
        });
        Schema::dropIfExists('role_users');
    }
};
