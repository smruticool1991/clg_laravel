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
            $table->string('admision_date')->nullable();
            $table->string('mr_no')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('barcode')->nullable();
            $table->string('section')->nullable();
            $table->string('gender')->nullable();
            $table->string('ref_by')->nullable();
            $table->string('board_name')->nullable();
            $table->string('board_roll')->nullable();
            $table->string('board_mark')->nullable();
            $table->string('board_percent')->nullable();
            $table->string('board_grade')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('adhar_no')->nullable();
            $table->string('mig')->nullable();
            $table->string('caste')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('hostel_status')->nullable();
            $table->string('slc')->nullable(); 
            $table->string('slc_date')->nullable(); 
            $table->string('join_year')->nullable();
            $table->string('pass_year')->nullable();            
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
