<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade');
            $table->unsignedInteger('absence_type_id');
            $table->foreign('absence_type_id')
                  ->references('id')->on('absence_types')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('absences');
    }
}
