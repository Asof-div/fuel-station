<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispensersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->index();
            $table->bigInteger('tank_id')->index()->unsigned();
            
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispensers');
    }
}
