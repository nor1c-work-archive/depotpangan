<?php

namespace App\Services\Admin;

use App\Traits\ApiResponser;
use DB;

class DeleteValidatorService
{
    use ApiResponser;
    public function deleteValidate($column, $column_id)
    {
        $databaseName = \Config::get('database.connections');
        
        $isExistedInOtherTable = 0;
        $tables = DB::Select(DB::raw('SELECT Distinct(TABLE_NAME) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA ="'.$databaseName['mysql']['database'].'"'));
        for ($i = 0; $i < count($tables); $i++) {
            
            if (
                $tables[$i]->TABLE_NAME == 'product_variation' || 
                $tables[$i]->TABLE_NAME == 'variation_detail' || 
                $tables[$i]->TABLE_NAME == 'product_combination_dtl' ||
                $tables[$i]->TABLE_NAME == 'product_attribute' ||
                $tables[$i]->TABLE_NAME == 'attribute_detail'
            ) {
                 
                continue;
                
            }

            

            $isColumnExisted = DB::Select(DB::raw("SHOW COLUMNS FROM " . $tables[$i]->TABLE_NAME . " LIKE '" . $column . "'"));
            if (count($isColumnExisted) > 0) {
                if (DB::table($tables[$i]->TABLE_NAME)->where($column, $column_id)->count() > 0) {
                    
                    $isColumnExisted = DB::Select(DB::raw("SHOW COLUMNS FROM " . $tables[$i]->TABLE_NAME . " LIKE 'deleted_at'"));
                    if (count($isColumnExisted) > 0) {
                              
                        if (DB::table($tables[$i]->TABLE_NAME)->where($column, $column_id)->whereNull('deleted_at')->count() > 0) {
                            $isExistedInOtherTable = 1;
                        }    
                    } else {
                        
                        $isExistedInOtherTable = 1;
                    }    
                }

            }

        }

        
        return $isExistedInOtherTable;

    }
}
