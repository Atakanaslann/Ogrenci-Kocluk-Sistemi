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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('coach_id')->constrained('users')->onDelete('cascade');
            $table->string('title'); // Görev başlığı
            $table->string('task_type'); // 'ders' veya 'deneme'
            $table->string('ders_type')->nullable(); // Ders tipi (Türkçe, Matematik vs.)
            $table->string('ders_konu')->nullable(); // Ders konusu
            $table->string('deneme_type')->nullable(); // 'tekders' veya 'genel'
            $table->string('deneme_ders')->nullable(); // Deneme dersi
            $table->integer('deneme_sure')->nullable(); // Deneme süresi (dakika)
            $table->text('description'); // Görev açıklaması
            $table->date('due_date'); // Son tarih
            $table->boolean('completed')->default(false); // Tamamlanma durumu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
