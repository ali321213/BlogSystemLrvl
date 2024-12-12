<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500)->nullable();
            $table->string('phone_number', 500)->nullable();
            $table->string('email', 500)->unique();
            $table->string('gender', 500)->nullable();
            $table->string('password', 500)->nullable();
            $table->string('isActive', 500)->nullable();
            $table->string('isDeleted', 500)->nullable();
            $table->string('image', 500)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};