<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusFieldToPropertyRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties_requests', function (Blueprint $table) {
            $table->integer('status')->default(1)->comment('1 => Not Checked , 2 => Checked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties_requests', function (Blueprint $table) {
            //
        });
    }
}
