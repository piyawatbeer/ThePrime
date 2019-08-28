<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comname', 100);
            $table->string('address', 100);
            $table->string('mname', 100)->nullable(true);
            $table->string('tel', 50)->nullable(true);
            $table->string('line', 100)->nullable(true);
            $table->string('facebook', 100)->nullable(true);
            $table->string('idcard',13)->nullable(true);
            $table->string('email',100)->nullable(true);
            $table->string('logo', 100)->nullable(true);
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
        Schema::dropIfExists('company');
    }
}
