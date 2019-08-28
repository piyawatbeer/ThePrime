<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template', function (Blueprint $table) {
            $table->increments('template_id');
            $table->string('tname',500)->nullable(true);
            $table->integer('tgaruntee')->nullable(true);
            $table->string('tgname1',500)->nullable(true);
            $table->string('tgname2',500)->nullable(true);
            $table->string('tgname3',500)->nullable(true);
            $table->string('tgcomment',500)->nullable(true);
            $table->string('tdetail',500)->nullable(true);
            $table->decimal('tservice', 9,4)->nullable(true);
            $table->decimal('tprofit', 9,4)->nullable(true);
            $table->decimal('tvat', 9,4)->nullable(true);
            $table->decimal('tfcost', 9,4)->nullable(true);
            $table->decimal('tfcustomer', 9,4)->nullable(true);
            $table->decimal('tfwage', 9,4)->nullable(true);
            $table->integer('work_id')->nullable(true);
            $table->integer('options_id')->nullable(true);
            $table->integer('service_id')->nullable(true);
            $table->decimal('tsumlists', 11,2)->nullable(true);
            $table->decimal('tvatl', 11,2)->nullable(true);
            $table->decimal('tproductprice', 11,2)->nullable(true);
            $table->decimal('tsumprofits', 11,2)->nullable(true);
            $table->decimal('tgprofitpant', 11,2)->nullable(true);
            $table->decimal('tcostlast', 11,2)->nullable(true);
            $table->decimal('tpersent', 9,2)->nullable(true);
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
        Schema::dropIfExists('template');
    }
}
