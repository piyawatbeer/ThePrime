<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoqchangelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boqchangelist', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('mcost', 9,2)->nullable(true);
            $table->decimal('wcost', 9,2)->nullable(true);
            $table->decimal('wcostc', 9,2)->nullable(true);
            $table->decimal('mcostc', 9,2)->nullable(true);
            $table->decimal('wcostt', 9,2)->nullable(true);
            $table->decimal('mcostt', 9,2)->nullable(true);
            $table->integer('boq_id');
            $table->integer('boqchange_id');
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
        Schema::dropIfExists('boqchangelist');
    }
}
