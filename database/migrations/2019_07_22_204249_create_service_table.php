<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('service_id');
            $table->integer('service_code');
            $table->string('namec', 200)->nullable(true);
            $table->string('idcardc', 13)->nullable(true);
            $table->string('addressc', 500)->nullable(true);
            $table->string('telc', 20)->nullable(true);
            $table->string('emailc', 200)->nullable(true);
            $table->string('locationc', 500)->nullable(true);
            $table->string('detailc', 500)->nullable(true);
            $table->enum('service_status', ['การรังวัด','ส่งงานรังวัด', 'มัดจำ','ออกแบบ','รอเสนอราคา','เสนอราคาก่อสร้าง','ก่อสร้าง','ประกัน','จบแล้ว','ไม่สนใจบริการ']);
            $table->date('meetdate')->nullable(true)->default(null);
            $table->string('surveydetail', 500)->nullable(true);
            $table->string('surveypic',200)->nullable(true);
             $table->string('surveyurl', 500)->nullable(true);
            $table->integer('work_id');
            $table->integer('users_id')->nullable(true);
            $table->integer('surveyker')->nullable(true);
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
        Schema::dropIfExists('service');
    }
}
