<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('packages', function (Blueprint $table) {
            $table->increments('id_package');
            $table->string('package_name');
            $table->string('package_description')->nullable();
            $table->string('packages_for')->nullable();
            $table->string('package_amount')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('package_districts')->nullable();
            $table->string('package_audience')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
