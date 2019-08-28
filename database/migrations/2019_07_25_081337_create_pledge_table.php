<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledge', function (Blueprint $table) {
            $table->increments('pledge_id');
            $table->enum('pledge_type', ['price', 'persent']);
            $table->decimal('pledge_price', 9,2)->nullable(true);
            $table->decimal('pledge_persent', 9,2)->nullable(true);
            $table->decimal('pledge_total', 9,2)->nullable(true);
            $table->integer('service_id');
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
        Schema::dropIfExists('pledge');
    }
}
