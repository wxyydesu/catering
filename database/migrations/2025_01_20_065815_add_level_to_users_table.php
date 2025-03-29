<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom 'level' hanya jika belum ada
            if (!Schema::hasColumn('users', 'level')) {
                $table->string('level')->default('user');
            }
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level'); // Menghapus kolom 'level' jika migration di-revert
        });
    }
};
