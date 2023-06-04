<?php

namespace App\Contract\Admin;

interface ShippingMethodInterface
{
    public function all();

    public function show($shipiingMethod);

    public function update(array $parms, $shipiingMethod);

    public function isDefault();

    public function shippingMethod();

    public function shippingWithCity(array $parms);
}
