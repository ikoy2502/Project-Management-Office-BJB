<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectOwnersTable extends Migration
{
    public function up()
    {
        Schema::create('project_owners', function (Blueprint $table) {
            $table->id();
            $table->string('divisi', 100);
            $table->string('group', 100);
            $table->string('subgroup', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_owners');
    }
}
