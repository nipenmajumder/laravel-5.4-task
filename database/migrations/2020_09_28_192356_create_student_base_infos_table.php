<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentBaseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_base_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('std_name');
            $table->string('std_father_name');
            $table->string('std_mother_name');
            $table->string('dept_name');
            $table->string('blood_group');
            $table->string('std_birth_date');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_base_infos');
    }
}
