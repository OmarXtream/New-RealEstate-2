<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesMarkatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_markatings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('phone');

            $table->string('type');

            $table->string('city');
            $table->integer('rooms');
            $table->integer('baths');

            $table->integer('price');

            $table->text('details')->nullable();

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
        Schema::dropIfExists('properties_markatings');
    }
}
