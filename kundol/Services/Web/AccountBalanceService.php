<?php

namespace App\Services\Web;

use App\Models\Web\AccountBalance;
use App\Traits\ApiResponser;

class AccountBalanceService {
    use ApiResponser;

    private $user_id;

    public function __construct() {
        $this->user_id = \Auth::check();
        dd($this->user_id);
    }

    public function homeIndex()
    {
        $data['histories'] = $this->getHistories();

        return $data;
    }

    private function getHistories() {
        $accountBalance = AccountBalance::where('customer_id', $this->user_id);

        return $accountBalance->get();
    }
}
