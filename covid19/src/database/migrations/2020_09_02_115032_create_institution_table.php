<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id_institution');
            $table->string('name');
            $table->string('address_details')->nullable();
            $table->string('district_name')->nullable();
            $table->integer('type')->default(0);
            $table->integer('city')->default(0);
            $table->integer('union')->default(0);
            $table->integer('word')->default(0);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('institutions');
    }
}
