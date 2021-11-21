<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('s_name');
            $table->string('admision_date');
            $table->string('mr_no');
            $table->string('roll_no');
            $table->string('barcode');
            $table->string('section');
            $table->string('gender');
            $table->string('ref_by');
            $table->string('board_name');
            $table->string('board_roll');
            $table->string('board_mark');
            $table->string('board_percent');
            $table->string('board_grade');
            $table->string('school_name');
            $table->string('school_address');
            $table->string('adhar_no');
            $table->string('mig');
            $table->string('caste');
            $table->string('blood_group');
            $table->string('hostel_status')->nullable();
            $table->string('slc'); 
            $table->string('slc_date'); 
            $table->string('join_year');
            $table->string('pass_year');            
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
        Schema::dropIfExists('students');
    }
}
