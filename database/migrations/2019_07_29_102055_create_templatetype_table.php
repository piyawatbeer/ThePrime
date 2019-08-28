<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatetype', function (Blueprint $table) {
            $table->increments('templatetype_id');
            $table->string('totname',500)->nullable(true);
            $table->integer('template_id')->nullable(true);
            $table->integer('optionstype_id')->nullable(true);
            $table->string('tworker',200)->nullable(true);
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
        Schema::dropIfExists('templatetype');
    }
}
