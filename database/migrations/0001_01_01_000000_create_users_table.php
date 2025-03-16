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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Birincil anahtar (id)
            $table->string('name'); // Kullanıcı adı
            $table->string('email')->unique(); // E-posta adresi
            $table->string('password'); // Şifre
            $table->enum('role', ['student', 'coach','admin'])->default('student'); // Kullanıcı rolü
            $table->timestamps(); // created_at ve updated_at sütunları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
