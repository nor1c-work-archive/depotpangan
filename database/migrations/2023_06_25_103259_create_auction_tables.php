<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBigInteger('product_id');
            $table->float('qty')->default(0);
            $table->unsignedTinyInteger('duration')->default(1);
            $table->float('starting_price')->default(0);
            $table->float('min_bid')->default(0);
            $table->float('multiplier_bid')->default(0);
            $table->enum('is_active', [0, 1])->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
