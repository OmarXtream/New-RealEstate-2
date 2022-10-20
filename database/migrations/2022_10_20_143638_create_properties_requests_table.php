<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('phone');
            $table->string('type');

            $table->string('city');
            $table->integer('rooms');
            $table->integer('baths');

            $table->integer('min_price');
            $table->integer('max_price');


            $table->string('first_district');
            $table->string('Second_district');
            $table->string('Third_district');
            $table->string('Fourth_district');

            $table->text('details');

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
        Schema::dropIfExists('properties_requests');
    }
}
