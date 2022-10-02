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
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('consume_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('consume_id');
            $table->unsignedInteger('tag_id');
            $table->timestamps();
            $table->foreign('consume_id')->references('id')->on('consumes');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('consume_id',function(Blueprint $table){
        //     $table->dropForeign(['consume_id']);
        //     $table->dropForeign(['tag_id']);
        // });
        Schema::dropIfExists('consume_tag');
        Schema::dropIfExists('tags');
    }
};
