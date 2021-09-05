<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('position_name')->nullable();
            $table->double('normal_rate', 5, 2)->defaults(0);
            $table->double('overtime_rate', 5, 2)->defaults(0);
            $table->double('holiday_rate', 5, 2)->defaults(0);
            $table->double('ppe_cost', 5, 2)->defaults(0);
            $table->double('management_fee', 5, 2)->defaults(0);
            //$table->timestamps();
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
        Schema::dropIfExists('positions');
    }
}
