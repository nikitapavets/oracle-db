<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')
                ->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedInteger('city_id');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('city_id');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });

        Schema::dropIfExists('cities');
    }
}
