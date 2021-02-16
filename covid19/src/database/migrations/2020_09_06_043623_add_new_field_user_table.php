<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('mobile_no')->nullable();
            $table->integer('is_active')->default(0);
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('national_id');
            $table->dropColumn('mobile_no');
            $table->dropColumn('is_active');
            $table->dropColumn('picture');
        });
    }
}
