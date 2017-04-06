<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHealthInsurances extends Migration
{
    public function up()
    {
        Schema::create('health_insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default(1);
            $table->string('name');
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
        Schema::dropIfExists('health_insurances');
    }
}
