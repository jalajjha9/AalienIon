<?php
namespace App\Http\Controllers;
ini_set('serialize_precision', -1);

use App\Device;
use Illuminate\Http\Request;
use Exception;

class DeviceApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function sendResponse($result, $message)
    {
    	$response = [
            'status' => 1,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'status' => 0,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function getDeviceOnId($id)
    {
        if(!$id) {
            return $this->sendError('Device id is empty',[], 200);
        }

        $devices = Device::getDeviceOnId($id);
        if(!$devices) {
            return $this->sendError('Device id is incorrect',[], 200);
        }

        if ($devices->isEmpty()) {
            return $this->sendError('Device is not configured.',[], 200);
        }

        return $this->sendResponse($devices->toArray(), 'Device configuration fetched successfully.');
    }

    public function postDeviceMonitoring(Request $request) 
    {
       $data = $request->all();
       try{
            $validateRequestFormat = $this->validateMonitoringRequestFormat($data);
            if(!$validateRequestFormat) {
                    return $this->sendError('Invalid request format.',[], 400);
            }

            $validateRequestData = $this->validateMonitoringRequestData($data);
            if(!$validateRequestData['status']) {
                return $this->sendError($validateRequestData['msg'],[], 400);
            }

            $insertData = Device::postMonitoringData($data);
            if($insertData['status']) {
                    return $this->sendResponse([], 'Data saved successfully.');
            } else {
                    return $this->sendError($insertData['msg'],[], 200);
            }
        } catch(\Exception $e) {
            echo $e;
            return $this->sendError('Something went wrong. Could not save data',[], 500);
        }
    }

    public function validateMonitoringRequestFormat($data)
    {
        if(empty($data)) {
            return false;
        }
        if(!array_key_exists('device_id', $data)) {
            return false;
        } else if(!array_key_exists('battery_pack_temp', $data)) {
            return false;
        } else if(!array_key_exists('battery_pack_voltage', $data)) {
            return false;
        } else if(!array_key_exists('battery_details', $data)) {
            return false;
        } else if(!is_array($data['battery_details'])) {
            return false;
        } else {
            return true;
        }
    }

    public function validateMonitoringRequestData($data)
    {
        if(!is_numeric($data['device_id'])) {
            return ['status' => false, 'msg' => 'device_id is invalid'];
        } else if(strlen((string)$data['device_id']) != 10) {
            return ['status' => false, 'msg' => 'device_id is invalid'];
        } else if(!is_numeric($data['battery_pack_temp'])) {
            return ['status' => false, 'msg' => 'battery_pack_temp is invalid'];
        } else if(!is_numeric($data['battery_pack_voltage'])) {
            return ['status' => false, 'msg' => 'battery_pack_voltage is invalid'];
        } else if(count($data['battery_details']) == 0) {
            return ['status' => false, 'msg' => 'battery_details can not be empty'];
        } else {
            return ['status' => true];
        }
    }
}