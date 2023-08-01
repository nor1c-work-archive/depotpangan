<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Log;

class CurrentBalance extends Command
{
    protected $signature = 'view:customer_current_balance';

    protected $description = 'Create or replace current balance view.';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('config:cache');

        Log::info('command running ......');
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement("
                CREATE OR REPLACE VIEW customer_current_balance AS
                SELECT 
                    customer_balances.customer_id,
                    SUM(customer_balances.total)
                    - IFNULL(
                        (
                            SELECT SUM(order_price+shipping_cost+total_tax)
                            FROM orders
                            WHERE
                                customer_id=customer_balances.customer_id
                                AND payment_method='balance'
                        ),
                        0
                    ) AS current_balance
                FROM customer_balances
                GROUP BY customer_balances.customer_id
            ");

            Log::info('current balance command ran successfully!');
        } else if (env('DB_CONNECTION') == 'pgsql') {
            // 
        }
    }
}
