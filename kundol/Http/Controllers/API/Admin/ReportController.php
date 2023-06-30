<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\AvailableQty;
use App\Models\Admin\Product;
use App\Models\Admin\PurchaseDetail;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{


    public function __construct()
    {
    }

    public function stockOnHand()
    {
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        
        $AvailableQty = AvailableQty::with('warehouse')
                                    ->with('current_value_simple_product')
                                    ->with('current_value_variable_product')
                                    ->with('product', 'product.detail');

        if (isset($_GET['warehouse_id']) && $_GET['warehouse_id'] != '') {
            $AvailableQty = $AvailableQty->where('warehouse_id', $_GET['warehouse_id']);
        }

        if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
            $productCategory = $_GET['category_id'];
            $product = Product::type();
            $product = $product->whereHas('category', function ($query) use ($productCategory) {
                $query->where('product_category.category_id', $productCategory);
            })->pluck('id');

            $AvailableQty = $AvailableQty->whereIn('product_id', $product);
        }

        if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
            $AvailableQty = $AvailableQty->where('product_id', $_GET['product_id']);
        }

        $AvailableQty = $AvailableQty->paginate($numOfResult);

        return $AvailableQty;
    }


    public function outOfStock()
    {
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        $AvailableQty = AvailableQty::with('warehouse')->with('product', 'product.detail');
        if (isset($_GET['warehouse_id']) && $_GET['warehouse_id'] != '') {
            $AvailableQty = $AvailableQty->where('warehouse_id', $_GET['warehouse_id']);
        }
        if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
            $productCategory = $_GET['category_id'];
            $product = Product::type();
            $product = $product->whereHas('category', function ($query) use ($productCategory) {
                $query->where('product_category.category_id', $productCategory);
            })->pluck('id');

            $AvailableQty = $AvailableQty->whereIn('product_id', $product);
        }
        if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
            $AvailableQty = $AvailableQty->where('product_id', $_GET['product_id']);
        }
        $AvailableQty = $AvailableQty->where('remaining', 0);

        $AvailableQty = $AvailableQty->paginate($numOfResult);

        return $AvailableQty;
    }




    public function purchaseReport()
    {
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        $purchaseDetail = PurchaseDetail::with(['product', 'product.detail', 'product.product_combination', 'product.product_combination.combination', 'product.product_combination.combination.variation', 'product.product_combination.combination.variation.variation_detail', 'product_combination']);
        if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
            $purchaseDetail = $purchaseDetail->where('product_id', $_GET['product_id']);
        }
        if (isset($_GET['warehouse_id']) && $_GET['warehouse_id'] != '') {
            $warehouse_id = $_GET['warehouse_id'];
            $purchaseDetail = $purchaseDetail->whereHas('purchase', function ($query) use ($warehouse_id) {
                $query->where('warehouse_id', $warehouse_id);
            });
        }
        return $purchaseDetail->paginate($numOfResult);
    }

    public function expenseReport()
    {
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }
        $expenses = DB::table('expense_report')->paginate($numOfResult);

        return $expenses;
    }
    
    public function advOrderReport() {
        if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
            $numOfResult = $_GET['limit'];
        } else {
            $numOfResult = 100;
        }

        $orders = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->leftJoin('products', 'order_detail.product_id', '=', 'products.id')
            ->leftJoin('product_detail', 'products.id', '=', 'product_detail.product_id')
            ->leftJoin('product_category', 'products.id', '=', 'product_category.product_id')
            ->leftJoin('units', 'products.product_unit', '=', 'units.id')
            ->leftJoin('unit_detail', 'unit_detail.unit_id', '=', 'units.id')
            ->leftJoin('warehouses', 'order_detail.warehouse_id', '=', 'warehouses.id')
            ->leftJoin(DB::raw('(SELECT products.id AS product_id, SUM(order_detail.qty) AS total_qty, SUM(order_detail.total) as total_price
                    FROM orders
                    LEFT JOIN order_detail ON order_detail.order_id = orders.id
                    LEFT JOIN products ON products.id = order_detail.product_id
                    GROUP BY products.id) AS oo'), 'oo.product_id', '=', 'products.id')
            ->select('products.id as product_id', 'product_detail.title', 'products.is_b2c', 'unit_detail.name as unit_name', 'oo.total_qty', 'oo.total_price');

        // FILTERS
        // Warehouse
        if (isset($_GET['warehouse_id']) && $_GET['warehouse_id'] != '') {
            $orders = $orders->where('warehouses.warehouse_id', $_GET['warehouse_id']);
        }

        // Product Category
        if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
            $orders = $orders->where('product_category.category_id', $_GET['category_id']);
        }

        // Product ID
        if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
            $orders = $orders->where('products.id', $_GET['product_id']);
        }
        
        // Area/state
        if (isset($_GET['state_id']) && $_GET['state_id'] != '') {
            $orders = $orders->where('warehouses.state_id', $_GET['state_id']);
        }

        // B2B or B2C
        if (isset($_GET['is_b2c']) && $_GET['is_b2c'] == 1) {
            $orders = $orders->where('products.is_b2c', 1);
        } else {
            $orders = $orders->where('products.is_b2c', 0);
        }
        
        // filter by period
        if (isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date'] != "" && $_GET['end_date'] != "") {
            $range_start_date = explode("/", $_GET['start_date']);
            $formatted_start_date = $range_start_date[2]."-".$range_start_date[1]."-".$range_start_date[0];

            $range_end_date = explode("/", $_GET['end_date']);
            $formatted_end_date = $range_end_date[2]."-".$range_end_date[1]."-".$range_end_date[0];

            $orders = $orders->whereBetween('orders.created_at', [$formatted_start_date, $formatted_end_date]);
        }

        $orders = $orders->groupBy('products.id');

        $orders = $orders->paginate($numOfResult);

        return $orders;
    }
}
