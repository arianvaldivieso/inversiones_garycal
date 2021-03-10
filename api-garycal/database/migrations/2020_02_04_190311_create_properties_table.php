<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('address')->nullable();
            $table->longText('description')->nullable();
            $table->longText('referral_point')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->float('price')->nullable();
            $table->float('surface')->nullable();
            $table->float('baths')->nullable();
            $table->float('rooms')->nullable();
            $table->float('garages')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('principal')->default(0);
            $table->string('city')->default('Ciudad Bolívar');
            $table->string('ml')->nullable();
            $table->string('ml_id')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
