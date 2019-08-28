<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building', function (Blueprint $table) {
            $table->increments('build_id');
            $table->integer('service_id')->nullable(true);
            $table->date('startbuild')->nullable(true)->default(null);
            $table->date('planbuild')->nullable(true)->default(null);
            $table->date('endbuild')->nullable(true)->default(null);
            $table->date('startgaruntee')->nullable(true)->default(null);
            $table->date('endgaruntee')->nullable(true)->default(null);
            $table->string('garunteepic',250)->nullable(true);
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
        Schema::dropIfExists('building');
    }
}
