<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingRajaOngkirToOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping_ro_method', 50);
            $table->string('shipping_ro_service', 50);
            $table->char('shipping_ro_province_id', 3);
            $table->string('shipping_ro_province', 50);
            $table->char('shipping_ro_city_id', 3);
            $table->string('shipping_ro_city', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shipping_ro_method');
            $table->dropColumn('shipping_ro_service');
            $table->dropColumn('shipping_ro_province_id');
            $table->dropColumn('shipping_ro_province');
            $table->dropColumn('shipping_ro_city_id');
            $table->dropColumn('shipping_ro_city');
        });
    }
}
