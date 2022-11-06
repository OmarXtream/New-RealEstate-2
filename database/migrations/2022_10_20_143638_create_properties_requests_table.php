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
            $table->string('phone');
            $table->string('type');

            $table->string('city');
            $table->integer('rooms');
            $table->integer('baths');

            $table->string('min_price');
            $table->string('max_price');


            $table->string('first_district')->nullable();
            $table->string('Second_district')->nullable();
            $table->string('Third_district')->nullable();
            $table->string('Fourth_district')->nullable();

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
        Schema::dropIfExists('properties_requests');
    }
}
