<?php

namespace App\Contract\Admin;

interface StateInterface
{
    public function all();

    public function show($state);

    public function store(array $parms);

    public function update(array $parms, $state);

    public function destroy($country);
}
