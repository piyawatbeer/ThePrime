<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('options_id');
            $table->string('oname', 200)->nullable(true);
            $table->integer('garuntee')->nullable(true);
            $table->string('gname1', 500)->nullable(true);
            $table->string('gname2', 500)->nullable(true);
            $table->string('gname3', 500)->nullable(true);
            $table->string('comment', 500)->nullable(true);
            $table->string('detail', 200)->nullable(true);
            $table->decimal('service', 9,4)->nullable(true);
            $table->decimal('profit', 9,4)->nullable(true);
            $table->decimal('vat', 9,4)->nullable(true);
            $table->decimal('fcost', 9,4)->nullable(true);
            $table->decimal('fcustomer', 9,4)->nullable(true);
            $table->decimal('fwage', 9,4)->nullable(true);
            $table->integer('work_id');
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
        Schema::dropIfExists('options');
    }
}
