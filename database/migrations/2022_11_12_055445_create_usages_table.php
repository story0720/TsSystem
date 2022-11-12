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
    public function up()
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('co_id');               //耗材名稱代號
            $table->unsignedInteger('tag_id')->nullable();  //耗材規格
            $table->integer('quantity');                    //領取數量
            $table->string('receiver');                     //領取人
            $table->string('memo')->nullable();             //備註
            $table->dateTime('getdate');                    //領取日期
            $table->foreign('co_id')->references('id')->on('consumes');
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
        Schema::dropIfExists('usages');
    }
};
