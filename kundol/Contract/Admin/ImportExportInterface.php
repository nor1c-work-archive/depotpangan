<?php

namespace App\Contract\Admin;

use Illuminate\Support\Collection;

interface ImportExportInterface
{
   public function store(array $parms);
}
