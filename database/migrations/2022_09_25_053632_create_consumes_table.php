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
            $table->string('co_standardName');          //耗材名稱
            $table->string('co_standard')->nullable(); ;//耗材規格
            $table->string('co_memo')->nullable();      //備註
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
