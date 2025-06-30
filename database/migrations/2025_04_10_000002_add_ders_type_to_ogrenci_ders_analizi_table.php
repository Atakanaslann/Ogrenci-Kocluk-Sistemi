<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ogrenci_ders_analizi', function (Blueprint $table) {
            // $table->string('ders_type')->nullable()->after('student_id'); // Bu satırı kaldırıyorum, çünkü zaten eklenmiş.
        });
    }

    public function down()
    {
        Schema::table('ogrenci_ders_analizi', function (Blueprint $table) {
            // $table->dropColumn('ders_type'); // Bu satırı kaldırıyorum, çünkü zaten eklenmiş.
        });
    }
}; 