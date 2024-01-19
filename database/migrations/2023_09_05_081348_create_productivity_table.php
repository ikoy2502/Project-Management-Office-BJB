<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductivityTable extends Migration
{
    public function up()
    {
        Schema::create('productivity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('task_id');
            $table->text('comment');
            $table->string('subject'); // Kolom "subject" ditambahkan di sini
            $table->date('date');
            $table->time('start');
            $table->time('end_time');
            $table->unsignedBigInteger('user_id');
            $table->time('time_rendered');
            $table->timestamps();

            // Menambahkan foreign key ke tabel 'projects' dan 'task_list'
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('task_id')->references('id')->on('task_list');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productivity');
    }
}

