<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('property_id')->nullable()->index();
            $table->unsignedInteger('feature_id');
            $table->timestamps();

            // $table->foreign('property_id')->references('id')->on('properties');
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_property');
    }
}
