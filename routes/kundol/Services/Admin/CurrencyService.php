<?php

namespace App\Services\Admin;

use App\Models\Admin\Currency;
use App\Traits\ApiResponser;
use DB;

class CurrencyService
{
    use ApiResponser;
    public function resetDefualtCurrency($currencyId = '')
    {
        try {
            if ($currencyId != '') {
                Currency::notCurrencyId($currencyId)->update(['is_default' => '0']);
                Currency::FindByCurrencyId($currencyId)->update(['status' => 'active']);
            } else {
                Currency::where('id','>','0')->update(['is_default' => '0']);
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
    }
}
