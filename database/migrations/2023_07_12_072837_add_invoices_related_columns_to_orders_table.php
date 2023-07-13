<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoicesRelatedColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('is_preorder', ['1', '0'])->default(0);
            $table->enum('po_use_dp', ['1', '0'])->default(0);
            $table->enum('is_contract', ['1', '0'])->default(0);
            $table->date('contract_payment_date_recurring')->nullable();
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
            $table->dropColumn('is_preorder');
            $table->dropColumn('po_use_dp');
            $table->dropColumn('is_contract');
            $table->dropColumn('contract_payment_date_recurring');
        });
    }
}
