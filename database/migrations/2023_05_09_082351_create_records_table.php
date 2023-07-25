<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('docket_number')->unique();
            $table->date('date_filed')->nullable();
            $table->string('cabinet');
            $table->string('nature');
            $table->string('petitioners');
            $table->string('lessor');
            $table->string('lessee');
            $table->string('location');
            $table->date('date_alhc')->nullable();
            $table->string('area')->nullable();
            $table->string('crops');
            $table->string('counsel')->nullable();
            $table->string('filename')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('records');
    }
}
