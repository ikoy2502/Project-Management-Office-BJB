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
        Schema::table('task_list', function (Blueprint $table) {
            if (!Schema::hasColumn('task_list', 'deskripsi')) {
                $table->text('deskripsi')->default('')->after('nama_kolom_lain'); // Ganti 'nama_kolom_lain' dengan nama kolom yang ada sebelumnya.
            }
        });
    }
    
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deskripsi_column_in_task_list', function (Blueprint $table) {
            //
        });
    }
};
