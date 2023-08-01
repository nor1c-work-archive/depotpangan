<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\CustomerBalanceInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerBalanceRequest;
use App\Models\Web\CustomerBalance;
use App\Repository\Admin\customerBalanceRepository;
use Illuminate\Support\Facades\Auth;

class CustomerBalanceController extends Controller
{
    private $customerBalanceRepository;

    public function __construct(CustomerBalanceInterface $customerBalanceRepository)
    {
        $this->customerBalanceRepository = $customerBalanceRepository;
    }

    public function index()
    {
        return $this->customerBalanceRepository->all();
    }

    public function show(CustomerBalance $customerBalance)
    {
        return $this->customerBalanceRepository->show($customerBalance);
    }

    public function deposit(CustomerBalanceRequest $request) {
        $parms = $request->all();
        $parms['customer_id'] = Auth::user()->id;

        return $this->customerBalanceRepository->deposit($parms);
    }

    public function getCurrentBalance() {
        $parms['customer_id'] = Auth::user()->id;

        return $this->customerBalanceRepository->get_current_balance($parms);
    }
}
