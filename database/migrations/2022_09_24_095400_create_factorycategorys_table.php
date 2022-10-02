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
    //廠商"種類"管理
    public function up()
    {
        Schema::create('factorycategorys', function (Blueprint $table) {
            $table->increments('ca_id');
            $table->string('ca_Name');
            $table->string('ca_Memo')->nullable();
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
        Schema::dropIfExists('factorycategorys');
    }
};
