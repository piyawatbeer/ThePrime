<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boq', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 200)->nullable(true);
            $table->string('list', 200)->nullable(true);
            $table->string('unit', 50)->nullable(true);
            $table->decimal('mcost', 9,2)->nullable(true);
            $table->decimal('wcost', 9,2)->nullable(true);
            $table->decimal('mcostp', 9,2)->nullable(true);
            $table->decimal('wcostp', 9,2)->nullable(true);
            $table->string('comment', 200)->nullable(true);
            $table->enum('type', ['boq', 'prime']);
            $table->integer('part_id');
            $table->integer('group_id');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->integer('typesub_id');
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
        Schema::dropIfExists('boq');
    }
}
