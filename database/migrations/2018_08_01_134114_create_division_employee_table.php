<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('division_id');
            $table->foreign('division_id')
                  ->references('id')->on('divisions')
                  ->onDelete('cascade');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')
                  ->references('id')->on('employees')
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
        Schema::dropIfExists('division_employee');
    }
}
