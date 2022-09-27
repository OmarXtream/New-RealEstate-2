<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
            $table->integer('phone');
            $table->integer('type')->comment('1 => military , 2=> civil , 3 => private');

            $table->String('commitments');
            $table->String('bank');
            $table->integer('salary');

            $table->integer('supported')->comment('1 => no , 2=> yes ');

            $table->String('notes');

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
        Schema::dropIfExists('info_forms');
    }
}
