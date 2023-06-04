<?php

namespace App\Repository\Admin;

use App\Contract\Admin\ShippmentWithCityInterface;
use App\Http\Resources\Admin\ShippmentWithCity as ShippmentWithCityResource;
use App\Models\Admin\ShippmentWithCity;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class ShippmentWithCityRepository implements ShippmentWithCityInterface
{
    use ApiResponser;
    
    public function all()
    {
        try {
            $shippmentWithCity = new ShippmentWithCity;
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                if (isset($_GET['city_id']) && is_numeric($_GET['city_id']) && $_GET['city_id'] > 0) {
                    $shippmentWithCity = $shippmentWithCity->cityId($_GET['city_id']);
                }
                return $this->successResponse(ShippmentWithCityResource::collection($shippmentWithCity->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['getCountry']) && $_GET['getCountry'] == '1') {
                $shippmentWithCity = $shippmentWithCity->with('country');
            }
            if (isset($_GET['getState']) && $_GET['getState'] == '1') {
                $shippmentWithCity = $shippmentWithCity->with('state');
            }
            if (isset($_GET['getCity']) && $_GET['getCity'] == '1') {
                $shippmentWithCity = $shippmentWithCity->with('city');
            }
            if (isset($_GET['country_id']) && is_numeric($_GET['country_id']) && $_GET['country_id'] > 0) {
                $shippmentWithCity = $shippmentWithCity->countryId($_GET['country_id']);
            }
            if (isset($_GET['state_id']) && is_numeric($_GET['state_id']) && $_GET['state_id'] > 0) {
                $shippmentWithCity = $shippmentWithCity->stateId($_GET['state_id']);
            }
            if (isset($_GET['city_id']) && is_numeric($_GET['city_id']) && $_GET['city_id'] > 0) {
                $shippmentWithCity = $shippmentWithCity->cityId($_GET['city_id']);
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $shippmentWithCity = $shippmentWithCity->searchParameter($_GET['searchParameter']);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $shippmentWithCity = $shippmentWithCity->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(ShippmentWithCityResource::collection($shippmentWithCity->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            foreach ($parms['city_id'] as $i => $city_id) {
                $data['city_id'] = $city_id['id'];
                $data['shippment_price'] = $parms['shippment_price'];
                $data['country_id'] = $parms['country_id'];
                $data['state_id'] = $parms['state_id'];
                $data['shipping_method_id'] = $parms['shipping_method_id'];
                $sql = new ShippmentWithCity;
                $sql = $sql->create($data);
            }

        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new ShippmentWithCityResource($sql), 'Shippment With City Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $shippmentWithCity)
    {
        // return $parms;
        try {
            $shippmentWithCity->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($shippmentWithCity) {
            return $this->successResponse(new ShippmentWithCityResource($shippmentWithCity), 'Shippment With City Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($shippmentWithCity)
    {
        try {
            $sql = ShippmentWithCity::findOrFail($shippmentWithCity);
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
