<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('national_id')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
           //$table->string('email')->nullable();
            //$table->string('birth_date')->nullable();
            //$table->string('gender')->nullable();
            //$table->string('employee_id')->nullable();
           //$table->string('company')->nullable();
            $table->datetimeTz('updated_at')->useCurrent();
            $table->datetimeTz('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
