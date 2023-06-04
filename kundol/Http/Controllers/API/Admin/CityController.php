<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Admin\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract\Admin\CityInterface;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    private $CityRepository;

    public function __construct(CityInterface $CityRepository)
    {
        $this->CityRepository = $CityRepository;
    }

    public function index()
    {
        return $this->CityRepository->all();
    }

    public function show(City $city)
    {
        return $this->CityRepository->show($city);
    }

    public function store(CityRequest $request)
    {
        $parms = $request->all();
        return $this->CityRepository->store($parms);
    }

    public function update(CityRequest $request, City $city)
    {
        $parms = $request->all();
        return $this->CityRepository->update($parms, $city);
    }

    public function destroy($id)
    {
        return $this->CityRepository->destroy($id);
    }
}
