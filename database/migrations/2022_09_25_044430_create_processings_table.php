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
    //加工管理
    public function up()
    {
        Schema::create('processings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr_categoryname');                  //加工方法
            $table->string('pr_memo')->nullable();              //備註
            $table->timestamps();

            // $table->string('pr_standard')->nullable();          //加工規格
            // $table->integer('pr_price');                        //單價
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processings');
    }
};
