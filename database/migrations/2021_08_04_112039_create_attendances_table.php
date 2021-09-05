<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('id');
            //$table->date('created_at');
            $table->unsignedInteger('national_id');
            $table->string('name');
            $table->string('designation');
            $table->string('location');
          //  $table->datetime('time_in');
           // $table->datetime('time_out');
           // $table->double('num_hr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
