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
        Schema::create('department_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('department');

            $table->foreign('user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user', 'department']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_users');
    }
};
