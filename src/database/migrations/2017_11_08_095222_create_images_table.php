<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('notebook_id');
            $table->string('link');
            $table->unsignedSmallInteger('type');
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreign('notebook_id')->references('id')->on('notebooks')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['notebook_id']);
        });

        Schema::dropIfExists('images');
    }
}
