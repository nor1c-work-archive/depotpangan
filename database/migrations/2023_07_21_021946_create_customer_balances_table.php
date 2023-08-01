<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->enum('type', ['deposit', 'withdraw'])->default('deposit');
            $table->float('total');
            $table->string('payment_method')->default('midtrans');
            $table->string('snap_token')->nullable();
            $table->string('midtrans_order_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_balances');
    }
}
