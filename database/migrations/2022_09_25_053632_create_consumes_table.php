<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //耗材管理
    public function up()
    {
        Schema::create('consumes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('co_standardName');
            //$table->string('co_standard');
            $table->string('co_memo')->nullable();
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
        Schema::dropIfExists('consumes');
    }
};
