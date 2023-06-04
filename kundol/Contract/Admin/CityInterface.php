<?php

namespace App\Contract\Admin;

interface CityInterface
{
    public function all();

    public function show($city);

    public function store(array $parms);

    public function update(array $parms, $city);

    public function destroy($city);
}
