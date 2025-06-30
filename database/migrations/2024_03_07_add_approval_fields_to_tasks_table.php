<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->boolean('approved')->default(false)->after('completed');
            $table->timestamp('approved_at')->nullable()->after('approved');
            $table->timestamp('completed_at')->nullable()->after('completed');
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['approved', 'approved_at', 'completed_at']);
        });
    }
}; 