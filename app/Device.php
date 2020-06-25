<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Device extends Model {
    protected $fillable = [
        'device_id', 'device_type', 'contact_name', 'contact_email', 'contact_phone', 'contact_address'
    ];

    public static function getDeviceConfigOnId($id) 
    {
        $check = DB::table('devices')->where('device_id', $id)->first();
        if(!$check) {
            return false;
        }
        $config = DB::table('device_config')->where(['device_id' => $id])->orderBy('battery_number', 'ASC')->get();
        return $config;
    }

    public static function updateDeviceConfigDetails($postData)
    {
        $now = Carbon::now();
        $check = DB::table('device_config')->where('device_id', $postData['device_id'])->first();
        if($check) {
            $updateDataArray = [];


            DB::beginTransaction();
            try {
                for($j = 0; $j < 16; $j++) {
                    $updateDataArray = [
                        'charging_thrashold' => $postData['charging'][$j],
                        'discharge_thrashold' => $postData['discharging'][$j],
                        'updated_at' => $now,
                    ];
                    $update = DB::table('device_config')->where('device_id',$postData['device_id'])->where('battery_number', $j+1)->update($updateDataArray);
                }
            
                DB::commit();
                return true;
            } catch (\Exception $e) {
                DB::rollback();
                return false;
            }
        } else {
            $insertDataArray = [];
            for($j = 0; $j < 16; $j++) {
                $insertDataArray[] = [
                    'device_id' => $postData['device_id'],
                    'battery_number' => $j+1,
                    'charging_thrashold' => $postData['charging'][$j],
                    'discharge_thrashold' => $postData['discharging'][$j],
                    'updated_at' => $now,
                    'created_at' => $now
                ];
            }

            $insert = DB::table('device_config')->insert($insertDataArray);
            return $insert;
        }

        
    }
}