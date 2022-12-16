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
            $table->String('phone');
            $table->integer('type')->comment('1 => military , 2=> civil , 3 => private')->nullable();

            $table->String('Age')->nullable();

            $table->String('commitments')->nullable();
            $table->String('bank')->nullable();
            $table->String('salary')->nullable();

            $table->integer('supported')->comment('1 => no , 2=> yes ')->nullable();

            $table->String('notes')->nullable();

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
