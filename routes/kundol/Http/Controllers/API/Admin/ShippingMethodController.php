<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\ShippingMethod;
use App\Http\Requests\ShippingMethodRequest;
use App\Contract\Admin\ShippingMethodInterface;
use App\Http\Controllers\Controller as Controller;
use App\Repository\Admin\ShippingMethodRepository;

class ShippingMethodController extends Controller
{
    private $ShippingMethodRepository;

    public function __construct(ShippingMethodInterface $ShippingMethodRepository)
    {
        $this->ShippingMethodRepository = $ShippingMethodRepository;
    }

    public function index()
    {
        return $this->ShippingMethodRepository->all();
    }

    public function show(ShippingMethod $shippingMethod)
    {
        return $this->ShippingMethodRepository->show($shippingMethod);
    }

    public function update(ShippingMethodRequest $request, ShippingMethod $shippingMethod)
    {
        $parms = $request->all();
        return $this->ShippingMethodRepository->update($parms, $shippingMethod);
    }

    public function isDefault()
    {
        return $this->ShippingMethodRepository->isDefault();
    }

    public function shippingMethod()
    {
        return $this->ShippingMethodRepository->shippingMethod();
    }

    public function shippingWithCity(Request $request)
    {
        $parms = $request->all();
        return $this->ShippingMethodRepository->shippingWithCity($parms);
    }

}
