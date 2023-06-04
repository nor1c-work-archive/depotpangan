<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippmentWithCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippment_with_cities', function (Blueprint $table) {
            $table->id();
            $table->string('shippment_price');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('shipping_method_id');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippment_with_cities');
    }
}
