<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsmetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('msmetypes', function (Blueprint $table) {
            $table->increments('id_msmetype');
            $table->string('type');
            $table->tinyInteger('is_active')->nullable();
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
        Schema::dropIfExists('msmetypes');
    }
}
