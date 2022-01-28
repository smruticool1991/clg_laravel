<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->id();
            $table->string('book_no')->unique();
            $table->unsignedBigInteger('stream_uid');
            $table->foreign('stream_uid')->references('id')->on('streams')->onDelete('cascade');
            $table->unsignedBigInteger('dept_uid');
            $table->foreign('dept_uid')->references('id')->on('departments')->onDelete('cascade');
            $table->string('isbn_no')->nullable();
            $table->string('book_name')->unique();
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->string('edition')->nullable();
            $table->integer('quantity');
            $table->string('purchase_date')->nullable();
            $table->string('cost')->nullable();
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
        Schema::dropIfExists('book_details');
    }
}
