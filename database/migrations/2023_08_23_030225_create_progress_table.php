<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('task');
            $table->text('description');
            $table->timestamp('timestamp');
            $table->timestamps(); // Tambahkan jika Anda ingin menggunakan timestamps Laravel

            // Foreign key constraint
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress');
    }
}

