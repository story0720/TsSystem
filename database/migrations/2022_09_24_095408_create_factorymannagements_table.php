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
    //廠商管理
    public function up()
    {
        Schema::create('factorymannagements', function (Blueprint $table) {
            $table->increments('mn_id');
            $table->unsignedInteger('ca_id');
            $table->foreign('ca_id')->references('ca_id')->on('factorycategorys');
            $table->string('mn_Name');
            $table->string('mn_Contact');
            $table->string('mn_Tel1');
            $table->string('mn_Tel2')->nullable();
            $table->string('mn_Fax')->nullable();
            $table->string('mn_Address')->nullable();
            $table->string('mn_Memo')->nullable();
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

        Schema::dropIfExists('factorymannagements');
    }
};
