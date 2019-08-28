<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoqchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boqchange', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('mcost', 9,2)->nullable(true);
            $table->decimal('wcost', 9,2)->nullable(true);
            $table->string('detail', 200)->nullable(true);
            $table->enum('type', ['add', 'loss']);
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
        Schema::dropIfExists('boqchange');
    }
}
