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
        Schema::create('prtags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr_standard');                      //加工規格
            $table->integer('pr_price');                        //單價
            $table->timestamps();
        });


        Schema::create('processing_prtag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('processing_id');
            $table->unsignedInteger('prtag_id');
            $table->timestamps();
            $table->foreign('processing_id')->references('id')->on('processings');
            $table->foreign('prtag_id')->references('id')->on('prtags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prtags');
        Schema::dropIfExists('processings');
    }
};
