<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id('id_farmer');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('national_id')->nullable();
            $table->integer('type')->default(0);
            $table->string('msme_type')->nullable();
            $table->string('living_address_details')->nullable();
            $table->string('living_district_name')->nullable();
            $table->string('living_type')->nullable();
            $table->string('living_type_id')->nullable();
            $table->string('living_latitude')->nullable();
            $table->string('living_longitude')->nullable();
            $table->string('physical_organisation_name')->nullable();
            $table->string('physical_address_details')->nullable();
            $table->string('physical_district_name')->nullable();
            $table->string('physical_type')->nullable();
            $table->string('physical_type_id')->nullable();
            $table->string('physical_latitude')->nullable();
            $table->string('physical_longitude')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('farmers');
    }
}
