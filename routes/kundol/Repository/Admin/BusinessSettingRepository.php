<?php

namespace App\Repository\Admin;

use DB;
use App\Models\Admin\City;
use App\Models\Admin\State;
use App\Traits\ApiResponser;
use App\Models\Admin\Country;
use App\Models\Admin\Currency;
use App\Models\Admin\Language;
use App\Models\Admin\BusinessSetting;
use App\Contract\Admin\BusinessSettingInterface;
use App\Http\Resources\Admin\BusinessSetting as BusinessSettingResource;

class BusinessSettingRepository implements BusinessSettingInterface
{
    use ApiResponser;

    public function show($businessSettingId)
    {
        try {
            $businessSetting = new BusinessSetting;

            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $businessSetting = $businessSetting->with('gallary');
            }
            if (isset($_GET['getTimezone']) && $_GET['getTimezone'] == '1') {
                $businessSetting = $businessSetting->with('timezone');
            }
            return $this->successResponse(new BusinessSettingResource($businessSetting->firstOrFail()) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        $businessSetting = BusinessSetting::first();
        try {
            if ($businessSetting) {
                $sql = tap($businessSetting)->update($parms);
            } else {
                $sql = new BusinessSetting;
                $sql = $sql->create($parms);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new BusinessSettingResource($sql), 'Business Setting Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update($parms)
    {
        try {
            if (isset($parms['country_id']) && $parms['country_id'] > 0) {
                DB::table('countries')->update(['status' => 'inactive']);
    
                foreach ($parms['country_id'] as $country) {
                    $sql = Country::where('id', $country['country_id'])->update([
                        'status' => 'active'
                    ]);
                }
            }
    
            if (isset($parms['state_id']) && $parms['state_id'] > 0) {
                DB::table('states')->update(['status' => 'inactive']);
    
                foreach ($parms['state_id'] as $state) {
                    $sql = State::where('id', $state['id'])->update([
                        'status' => 'active'
                    ]);
                }
            }
    
            if (isset($parms['city_id']) && $parms['city_id'] > 0) {
                DB::table('cities')->update(['status' => 'inactive']);
    
                foreach ($parms['city_id'] as $city) {
                    $sql = City::where('id', $city['id'])->update([
                        'status' => 'active'
                    ]);
                }
            }
    
            if (isset($parms['language_id']) && $parms['language_id'] > 0) {
                DB::table('languages')->update(['status' => 'inactive']);
    
                foreach ($parms['language_id'] as $language) {
                    $sql = Language::where('id', $language['id'])->update([
                        'status' => 'active'
                    ]);
                }
            }

            if (isset($parms['currency_id']) && $parms['currency_id'] > 0) {
                DB::table('currency')->update(['status' => 'inactive']);
    
                foreach ($parms['currency_id'] as $currency) {
                    $sql = Currency::where('id', $currency['currency_id'])->update([
                        'status' => 'active'
                    ]);
                }
            }

        } catch (\Throwable $th) {
            return $this->errorResponse();
        }

        if ($sql) {
            return response()->json([
                'status' => 'Success',
                'message' => 'Business Setting Updated Successfully',
            ]);
        } else {
            return $this->errorResponse();
        }

    }
}
