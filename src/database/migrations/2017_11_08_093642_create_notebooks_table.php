<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('provider_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('config')->nullable();
            $table->decimal('price');
            $table->timestamps();
        });

        Schema::table('notebooks', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')
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
        Schema::table('notebooks', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['provider_id']);
        });

        Schema::dropIfExists('notebooks');
    }
}
