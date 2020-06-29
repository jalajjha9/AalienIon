<?php

namespace App;

use Illuminate\Database\Query\Expression as raw;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Exception;

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
        $checkDevice = DB::table('devices')->where('device_id', $postData['device_id'])->first();
        if(!$checkDevice) {
            return ['status'=>false, 'msg'=>'Device id does not match'];
        }
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
                return ['status'=>true];
            } catch (\Exception $e) {
                DB::rollback();
                return ['status'=>false, 'msg'=>'Could not save configuration. Please try again.'];
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
            if($insert) {
                return ['status'=>false];
            } else {
                return ['status'=>false, 'msg'=>'Could not save configuration. Please try again.'];
            }
        }
    }

    public static function getDeviceOnId($id)
    {
        $devices = DB::table('device_config')
                        ->select('device_id', 'battery_number', DB::raw('ifnull(charging_thrashold,0) as charging_thrashold'), DB::raw('ifnull(discharge_thrashold,0) as discharge_thrashold'), 'status', 'updated_at')
                        ->where('device_id', $id)
                        ->orderBy('battery_number', 'ASC')
                        ->get();
        return $devices;
    }

    public static function postMonitoringData($data)
    {
        $checkDevice = DB::table('devices')->where('device_id', $data['device_id'])->first();
        if(!$checkDevice) {
            return ['status'=>false, 'msg'=>'Device id does not match'];
        }

        $batteryCount = 0;
        $configData = DB::table('device_config')->where(['device_id' => $data['device_id']])->orderBy('battery_number', 'ASC')->get();

        if($configData->isEmpty()) {
            return ['status'=>false, 'msg'=>'Device configuration is not there for this device'];
        }
        
        $now = Carbon::now();
        DB::beginTransaction();
        try {
            $insertDataArray = [];
            foreach($data['battery_details'] as $battery) {
                $validate = true;
                
                if($battery['battery_no'] < 1 || $battery['battery_no'] > 16 ) {
                    $validate = false;
                }
                if($validate && $battery['charge_status'] !== 0 && $battery['charge_status'] !== 1) {
                    $validate = false;
                }
                if($validate && $battery['discharge_status'] !== 0 && $battery['discharge_status'] !== 1) {
                    $validate = false;
                }
                $charging_thrashold = self::getChargingThrashold($configData, $battery['battery_no']);
                if($validate && ($battery['battery_voltage'] < 3.2 || $battery['battery_voltage'] > $charging_thrashold)) {
                    $validate = false;
                }

                if($validate) {
                    $batteryCount = 1;
                    $insertDataArray[] = [
                        'device_id' => $data['device_id'],
                        'battery_no' => $battery['battery_no'],
                        'battery_pack_temp' => $data['battery_pack_temp'],
                        'battery_pack_voltage' => $data['battery_pack_voltage'],
                        'battery_voltage' => $battery['battery_voltage'],
                        'charge_status' => $battery['charge_status'],
                        'discharge_status' => $battery['discharge_status'],
                        'created_at' => $now,
                        'updated_at' => $now
                    ];
                }
            }
            DB::table('device_monitoring')->insert($insertDataArray);
            DB::commit();
            if($batteryCount)
                return ['status'=>true, 'msg'=>''];
            else 
                return ['status'=>false, 'msg'=>'Could not save data'];
        } catch(\Exception $e) {
            echo $e;
            DB::rollback();
            return ['status'=>false, 'msg'=>'Could not save data'];
        }
    }

    public static function getChargingThrashold($configData, $batteryNo)
    {
        $thrashold = 0;
        if($configData) {
            $key=array_search($batteryNo, array_column(json_decode(json_encode($configData),TRUE), 'battery_number'));
            if($configData[$key]) {
                $thrashold = $configData[$key]->charging_thrashold == '' ? 0 : $configData[$key]->charging_thrashold;
            }
        }
        
       return $thrashold;
    }

    public static function getDetailsForDashboard()
    {
        $customer = DB::table('devices')
                        ->select(
                            DB::raw("count(distinct(contact_phone)) as all_total"), 
                            DB::raw("(select count(distinct(contact_phone)) from devices where created_at BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()) as month_total"));
                        

        $devices = DB::table('devices')
                    ->select(
                        DB::raw("count(id) as all_total"), 
                        DB::raw("(select count(id) from devices where created_at BETWEEN (CURRENT_DATE() - INTERVAL 1 MONTH) AND CURRENT_DATE()) as month_total"));
                   
        $config = DB::table('device_config')
                    ->select(DB::raw("count(distinct(device_id)) as all_total, '0' as month_total"));

        $monitoring = DB::table('device_monitoring')
            ->select(DB::raw("count(distinct(device_id)) as all_total, '0' as month_total"));


        $resultUnion = $customer->unionAll($devices)->unionAll($config)->unionAll($monitoring);
        $result = $resultUnion->get();
        return $result;
    }
}