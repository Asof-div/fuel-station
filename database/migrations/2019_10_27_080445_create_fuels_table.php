<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('direction',['Delivery', 'Sold']);
            $table->bigInteger('tank_id')->index()->unsigned();
            $table->bigInteger('dispenser_id')->nullable()->index()->unsigned();
            $table->bigInteger('user_id')->nullable()->index()->unsigned();
            $table->bigInteger('last_fuel_id')->index()->nullable()->unsigned();
            $table->decimal('leter', 18,2)->default(0.00);
            $table->decimal('previous_leter')->default(0.00);
            $table->decimal('current_leter')->default(0.00);
            $table->timestamp('transaction_date')->nullable();
            $table->timestamps();

            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('last_fuel_id')->references('id')->on('fuels')->onDelete('set null');
            $table->foreign('dispenser_id')->references('id')->on('dispensers')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuels');
    }
}
