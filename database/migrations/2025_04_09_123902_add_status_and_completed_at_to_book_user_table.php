<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndCompletedAtToBookUserTable extends Migration
{
    public function up()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending');
            $table->timestamp('completed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('completed_at');
        });
    }
} 