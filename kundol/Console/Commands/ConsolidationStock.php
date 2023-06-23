<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Log;

class ConsolidationStock extends Command
{
    protected $signature = 'view:consolidation_stock';
    protected $description = 'Generate consolidation stock.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        \Artisan::call('view:clear');
        \Artisan::call('config:cache');

        Log::info('command running ......');
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement("
                CREATE OR REPLACE VIEW consolidation_stock as 
                SELECT
                    product_id, SUM(remaining) AS current_stock
                FROM (
                    select inventory.product_id, inventory.product_combination_id, inventory.warehouse_id, (SELECT sum(qty) from inventory as s_in WHERE stock_status = 'IN' and inventory.warehouse_id = s_in.warehouse_id and inventory.product_id = s_in.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_in.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id) as stock_in, (SELECT sum(qty) from inventory as s_out WHERE stock_status = 'OUT' and inventory.warehouse_id = s_out.warehouse_id and inventory.product_id = s_out.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_out.product_combination_id  else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id) as stock_out, (SELECT sum(qty) from inventory as s_in WHERE stock_status = 'IN' and inventory.warehouse_id = s_in.warehouse_id and inventory.product_id = s_in.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_in.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id)- IFNULL((SELECT sum(qty) from inventory as s_out WHERE stock_status = 'OUT' and inventory.warehouse_id = s_out.warehouse_id and inventory.product_id = s_out.product_id and case when inventory.product_combination_id is not null or inventory.product_combination_id != '' then  inventory.product_combination_id = s_out.product_combination_id else inventory.product_id > 0 end GROUP BY warehouse_id, product_id,product_combination_id), 0) as remaining, products.product_type, IF(product_type = 'simple' or product_type = 'digital', products.price,p_combination.price) as price, IF(product_type = 'simple' or product_type = 'digital', products.discount_price,'0') as discount_price from inventory LEFT join products on products.id = inventory.product_id LEFT join product_combination as p_combination on p_combination.id = inventory.product_combination_id
                    GROUP BY inventory.warehouse_id, inventory.product_id, inventory.product_combination_id
                ) AS a
                GROUP BY a.product_id
            ");
        } else if (env('DB_CONNECTION') == 'pgsql') {
            // 
        }
    }
}
