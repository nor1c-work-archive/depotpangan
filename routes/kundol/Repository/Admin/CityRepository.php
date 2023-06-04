<?php

namespace App\Repository\Admin;

use App\Contract\Admin\CityInterface;
use App\Http\Resources\Admin\City as CityResource;
use App\Models\Admin\City;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class CityRepository implements CityInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $city = new City;
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                $states = explode(",",$_GET['state_id']);
                $city = $city->whereIn('state_id', $states);
                if (isset($_GET['state_id']) && is_numeric($_GET['state_id']) && $_GET['state_id'] > 0) {
                    $city = $city->stateId($_GET['state_id']);
                }
                return $this->successResponse(CityResource::collection($city->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                $city = $city->with('country');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $city = $city->with('state');
            }
            if (isset($_GET['country_id']) && is_numeric($_GET['country_id']) && $_GET['country_id'] > 0) {
                $city = $city->countryId($_GET['country_id']);
            }
            if (isset($_GET['state_id']) && is_numeric($_GET['state_id']) && $_GET['state_id'] > 0) {
                $city = $city->stateId($_GET['state_id']);
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $city = $city->searchParameter($_GET['searchParameter']);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                if ($city->Active()) {
                    $city = $city->orderBy($_GET['sortBy'], $_GET['sortType']);
                } else {
                    $city = $city->OrderByStatus();
                }
            }

            return $this->successResponse(CityResource::collection($city->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($city)
    {
        try {
            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                return $this->successResponse(new CityResource(City::with('country')->cityId($city->id)->firstOrFail()), 'Data Get Successfully!');
            }

            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                return $this->successResponse(new CityResource(City::with('state')->cityId($city->id)->firstOrFail()), 'Data Get Successfully!');
            }

            return $this->successResponse(new CityResource($city), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new City;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new CityResource($sql), 'City Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $city)
    {
        // return $parms;
        try {
            $city->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($city) {
            return $this->successResponse(new CityResource($city), 'City Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($city)
    {
        try {
            $sql = City::findOrFail($city);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'City Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
