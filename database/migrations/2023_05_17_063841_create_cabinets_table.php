<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('cab_number');
            $table->string('row1')->nullable();;
            $table->string('row2')->nullable();;
            $table->string('row3')->nullable();;
            $table->string('row4')->nullable();;
            $table->string('row5')->nullable();;
            $table->string('row6')->nullable();;
            $table->string('row7')->nullable();;
            $table->string('row8')->nullable();;
            $table->string('row9')->nullable();;
            $table->string('row10')->nullable();;
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
        Schema::dropIfExists('cabinets');
    }
}
