<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdrsinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adrsinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_adrs_uid');
            $table->foreign('student_adrs_uid')->references('id')->on('students')->onDelete('cascade');
            $table->string('dist_name');
            $table->string('address');
            $table->string('f_name');
            $table->string('f_occu');
            $table->string('f_annual');
            $table->string('m_name');
            $table->string('m_occu');
            $table->string('m_annual');
            $table->string('mob_no');
            $table->string('wh_no');
            $table->string('lg_guard');
            $table->string('lg_guard_no');
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
        Schema::dropIfExists('adrsinfos');
    }
}
