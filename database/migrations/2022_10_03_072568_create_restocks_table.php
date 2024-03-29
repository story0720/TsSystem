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
    //耗材進貨管理
    public function up()
    {
        Schema::create('restocks', function (Blueprint $table) {
            $table->id();
            $table->string('restock_order_number')->unique();   //進貨單號
            $table->unsignedInteger('factorycategory_id');      //廠商種類ID
            $table->unsignedInteger('consume_id');              //耗材名稱ID    
            $table->unsignedInteger('mn_id');                   //廠商名稱ID   
            $table->foreign('mn_id')->references('mn_id')->on('factorymannagements'); 
            $table->unsignedInteger('specification');           //耗材規格
            $table->foreign('specification')->references('id')->on('tags'); 
            $table->date('re_date');                            //進貨日期
            $table->integer('re_quantity');                     //進貨數量
            $table->integer('re_unitprice');                    //進貨單價
            $table->integer('re_count');                        //總計金額
            $table->string('re_memo')->nullable();
            $table->timestamps();
            $table->foreign('factorycategory_id')->references('ca_id')->on('factorycategorys');
            $table->foreign('consume_id')->references('id')->on('consumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restocks');
    }
};
