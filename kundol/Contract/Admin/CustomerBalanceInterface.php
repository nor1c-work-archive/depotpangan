<?php

namespace App\Contract\Admin;

interface CustomerBalanceInterface {
   public function all();
   public function show($balance);
   public function deposit($balance);
   public function get_current_balance($balance);
}