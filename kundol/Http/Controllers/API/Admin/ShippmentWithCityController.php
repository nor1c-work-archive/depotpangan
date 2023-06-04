<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ShippmentWithCity;
use App\Http\Requests\ShippmentWithCityRequest;
use App\Contract\Admin\ShippmentWithCityInterface;

class ShippmentWithCityController extends Controller
{
    private $ShippmentWithCityRepository;

    public function __construct(ShippmentWithCityInterface $ShippmentWithCityRepository)
    {
        $this->ShippmentWithCityRepository = $ShippmentWithCityRepository;
    }

    public function index()
    {
        return $this->ShippmentWithCityRepository->all();
    }

    public function store(ShippmentWithCityRequest $request)
    {
        $parms = $request->all();
        return $this->ShippmentWithCityRepository->store($parms);
    }

    public function update(ShippmentWithCityRequest $request, ShippmentWithCity $shippmentWithCity)
    {
        $parms = $request->all();
        return $this->StateRepository->update($parms, $shippmentWithCity);
    }

    public function destroy($id)
    {
        return $this->ShippmentWithCityRepository->destroy($id);
    }

}
