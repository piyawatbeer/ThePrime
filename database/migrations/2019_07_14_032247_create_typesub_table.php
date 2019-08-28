<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typesub', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typesubnumber', 200)->nullable(true);
            $table->string('typesubname', 200)->nullable(true);
            $table->integer('part_id');
            $table->integer('group_id');
            $table->integer('category_id');
            $table->integer('type_id');
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
        Schema::dropIfExists('typesub');
    }
}
