<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        // DB::statement('ALTER TABLE projects ADD CONSTRAINT projects_status_check CHECK (status IN (?, ?, ?, ?, ?, ?, ?, ?))', [
        //     'Todo', 'On-Progress', 'Testing', 'Waiting Deploy',
        //     'Done', 'Cancel', 'Pending', 'Inisiasi'
        // ]);
    Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('project_code', 50)->unique();
    $table->string('project_name', 100);
    $table->unsignedBigInteger('project_owner_id');
    $table->unsignedBigInteger('lead_subgroup_id'); // Kolom untuk lead subgroup
    $table->unsignedBigInteger('secondary_subgroup_id'); // Kolom untuk secondary subgroup
    $table->text('description')->nullable()->nullable(); ;
    $table->unsignedBigInteger('category_id');
    $table->unsignedBigInteger('priority_id')->default(1);
    $table->unsignedBigInteger('pic_id'); // Kolom untuk nama PIC project
    $table->unsignedBigInteger('secondary_pic_id')->nullable(); // Kolom untuk secondary pic
    $table->date('target_date')->nullable();
    $table->enum('triwulan', ['Q1', 'Q2', 'Q3', 'Q4'])->nullable();
    $table->unsignedBigInteger('revision_id')->default(1);
    $table->unsignedBigInteger('status_id')->default(1);
    $table->string('imported_file')->nullable(); // Kolom untuk menyimpan nama file yang diimpor
    $table->timestamp('started_at')->nullable();
    // Define the check constraint with raw SQL
    // $checkConstraint = <<<SQL
    // status IN ('Todo', 'On-Progress', 'Testing', 'Waiting Deploy', 'Done', 'Cancel', 'Pending', 'Inisiasi')
    // SQL;

    // DB::statement("ALTER TABLE projects ADD CONSTRAINT projects_status_check CHECK ($checkConstraint)");

    // Define foreign key constraints
    $table->foreign('project_owner_id')->references('id')->on('project_owners');
    $table->foreign('lead_subgroup_id')->references('id')->on('project_owners'); // Menghubungkan dengan project_owner_id
    $table->foreign('secondary_subgroup_id')->references('id')->on('project_owners'); // Menghubungkan dengan project_owner_id
    $table->foreign('pic_id')->references('id')->on('users');
    $table->foreign('secondary_pic_id')->references('id')->on('users');
    $table->foreign('category_id')->references('id')->on('categories');
    $table->foreign('status_id')->references('id')->on('status');
    $table->foreign('priority_id')->references('id')->on('priorities');
    $table->foreign('revision_id')->references('id')->on('revisions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    
    }
}
