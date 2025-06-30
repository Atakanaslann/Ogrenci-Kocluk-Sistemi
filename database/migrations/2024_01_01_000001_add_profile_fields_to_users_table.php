<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tc_kimlik', 11)->nullable()->after('role');
            $table->string('city')->nullable()->after('tc_kimlik');
            $table->string('phone')->nullable()->after('city');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tc_kimlik', 'city', 'phone']);
        });
    }
}; 