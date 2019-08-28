<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatelist', function (Blueprint $table) {
            $table->increments('templatelist_id');
            $table->integer('templatetype_id')->nullable(true);
            $table->integer('template_id')->nullable(true);
            $table->integer('boq_id')->nullable(true);
            $table->string('tlist',500)->nullable(true);
            $table->string('tcomment',500)->nullable(true);
            $table->decimal('tfcostl', 9,2)->nullable(true);
            $table->decimal('tfcustomerl', 9,2)->nullable(true);
            $table->decimal('tfwagel', 9,2)->nullable(true);
            $table->decimal('tvalue', 11,2)->nullable(true);
            $table->decimal('tvaluetotal', 11,2)->nullable(true);
            $table->string('tunit',50)->nullable(true);
            $table->decimal('tmcost', 11,2)->nullable(true);
            $table->decimal('tmcosttotal', 11,2)->nullable(true);
            $table->decimal('tmcostc', 11,2)->nullable(true);
            $table->decimal('tmcostctotal', 11,2)->nullable(true);
            $table->decimal('twcost', 11,2)->nullable(true);
            $table->decimal('twcosttotal', 11,2)->nullable(true);
            $table->decimal('twcostc', 11,2)->nullable(true);
            $table->decimal('twcostctotal', 11,2)->nullable(true);
            $table->decimal('tmcostp', 11,2)->nullable(true);
            $table->decimal('tmcostptotal', 11,2)->nullable(true);
            $table->decimal('twcostp', 11,2)->nullable(true);
            $table->decimal('twcostptotal', 11,2)->nullable(true);
            $table->decimal('tsumlist', 11,2)->nullable(true);
            $table->decimal('tsumlistc', 11,2)->nullable(true);
            $table->decimal('tsumprofit', 11,2)->nullable(true);
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
        Schema::dropIfExists('templatelist');
    }
}
