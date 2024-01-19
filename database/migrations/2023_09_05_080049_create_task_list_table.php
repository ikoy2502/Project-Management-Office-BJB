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
        Schema::create('task_list', function (Blueprint $table) 
        {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->foreign('project_id')->references('id')->on('projects'); // Menambahkan foreign key ke tabel 'projects'
                $table->string('task');
                $table->text('deskripsi')->default('');
                $table->enum('status', [
                    'Todo', 'On-Progress', 'Testing', 'Waiting Deploy', 'Done', 'Cancel', 'Pending', 'Inisiasi'
                ])->default('Todo');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_list');
    }
};
