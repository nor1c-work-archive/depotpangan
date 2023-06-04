<?php

namespace App\Repository\Admin;

use App\Contract\Admin\TimezoneInterface;
use App\Http\Resources\Admin\Timezone as TimezoneResource;
use App\Models\Admin\Timezone;
use App\Traits\ApiResponser;

class TimezoneRepository implements TimezoneInterface
{
    use ApiResponser;
    public function all()
    {
        try {
            $timezone = new Timezone;
            if (isset($_GET['getAllData']) && $_GET['getAllData'] == '1') {
                return $this->successResponse(TimezoneResource::collection($timezone->get()), 'Data Get Successfully!');
            }
            if (isset($_GET['is_default']) && $_GET['is_default'] === '1') {
                return $this->successResponse(new TimezoneResource(Timezone::defaultTimezone()->firstOrFail()), 'Data Get Successfully!');
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $sortBy = ['id','name'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $timezone = $timezone->orderBy($_GET['sortBy'],$_GET['sortType']);
            }

            return $this->successResponse(TimezoneResource::collection($timezone->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($timezone)
    {
        try {
            return $this->successResponse(new TimezoneResource($timezone) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $sql = new Timezone;
            $sql = $sql->create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new TimezoneResource($sql), 'Timezone Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $timezone)
    {
        // return $parms;
        try {
            $timezone->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($timezone) {
            return $this->successResponse(new TimezoneResource($timezone), 'Timezone Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function destroy($timezone)
    {
        try {
            $sql = Timezone::findOrFail($timezone);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Timezone Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function setTimezone($parms)
    {

        $env = file_get_contents(base_path() . '/.env');

        $env = preg_split('/\s+/', $env);
        

        foreach ($env as $env_key => $env_value) {

            $entry = explode("=", $env_value, 2);

            if ($entry[0] == 'APP_TIMEZONE') {
                $env[$env_key] = 'APP_TIMEZONE' . "=" . $parms['name'];
            } else {
                $env[$env_key] = $env_value;
            }
        }

        $env = implode("\n", $env);

        file_put_contents(base_path() . '/.env', $env);

        $timezone = Timezone::where('name', $parms['name'])->first();

        if ($timezone != '') {
            Timezone::notTimezoneId($timezone->id)->update(['is_default' => '0']);
            Timezone::FindByTimezoneId($timezone->id)->update(['is_default' => '1']);
        } else {
            Timezone::where('id','>','0')->update(['is_default' => '0']);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'TimeZone Updated Successfully'
        ]);
    }
}
