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
        Schema::create('orders', function (Blueprint $table) {            
            $table->increments('id');
            $table->unsignedInteger('mn_id');    
            $table->unsignedInteger('pr_id');       
            $table->string('serialnumber');                 //加工編號(流水號)
   
            $table->date('materialdate');                    //發料日期
            $table->date('shipdate');                        //出貨日期
            $table->date('estimateddate')->nullable();       //預計出交日期
            $table->integer('estimatedquantity');            //應交數量
            $table->integer('unitprice');                    //金額(成品單價)
            $table->integer('count');                        //總計
            $table->integer('deliverydate')->nullable();     //交貨日期
            $table->string('memo')->nullable();              //備註
            $table->foreign('mn_id')->references('mn_id')->on('factorymannagements');       //廠商名稱
            $table->foreign('pr_id')->references('id')->on('processings');                  //加工種類名稱
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
        Schema::dropIfExists('orders');
    }
};
