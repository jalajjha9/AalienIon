<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Validator;
use DataTables;

class DeviceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('deviceList');
    }

    public function  onboarding() 
    {
        return view('deviceOnboarding');
    }

    public function addDevice(Request $request)
    {
        try{
            //echo $request->contact_phone;die;
            $validation = $request->validate([
                'device_id' => 'required|unique:devices,device_id,'.$request->device_id,
                'device_type' => 'required',
                'contact_name' => 'required',
                'contact_email' => 'nullable|string|email',
                'contact_phone' => 'required|digits:10',
                'contact_address' => 'required'
            ]);
    
            $device = new Device;
    
            $device->device_id = $request->device_id;
            $device->device_type = $request->device_type;
            $device->contact_name = $request->contact_name;
            $device->contact_email = $request->contact_email;
            $device->contact_phone = $request->contact_phone;
            $device->contact_address = $request->contact_address;
    
            $device->save();
    
            return redirect('/device/onboarding')->with('successMessage', 'Device added successfully');
        } catch(Throwable $e) {
            return redirect('/device/onboarding')->with('errorMessage', 'Something went wrong. Please refresh the page and try again.');
        }
    }

    public function editDevice(Request $request) 
    {
        $validationArray = [
            'device_id' => 'required',
            'device_type' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'nullable|string|email',
            'contact_phone' => 'required|digits:10',
            'contact_address' => 'required'
        ];
        
        $validation = Validator::make($request->all(),$validationArray);
        $error_array = array();
        $success_output = '';
        if ($validation->fails()){
            foreach ($validation->messages()->getMessages() as $field_name => $messages){
                $error_array[] = $messages; 
            }
        } else {
            $device = Device::find($request->eid);
            $device->device_type = $request->device_type;
            $device->contact_name = $request->contact_name;
            $device->contact_email = $request->contact_email;
            $device->contact_phone = $request->contact_phone;
            $device->contact_address = $request->contact_address;
            $device->save();
            $success_output = '<div class="alert alert-success">Data Updated</div>';
        }
    
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function getDevice(Request $request) 
    {
        $id = $request->get('id', '');
        $device = Device::find($id);
        if($device) {
            $output = array(
                'device_id'    =>  $device->device_id,
                'device_type'     =>  $device->device_type,
                'contact_name'     =>  $device->contact_name,
                'contact_email'     =>  $device->contact_email,
                'contact_phone'     =>  $device->contact_phone,
                'contact_address'     =>  $device->contact_address,
                'status'     =>  $device->status,
                'created_at'     =>  date('Y-m-d H:i:s',strtotime($device->created_at)),
                'updated_at'     =>  date('Y-m-d H:i:s',strtotime($device->updated_at)),
            );
        } else {
            $output = '';
        }
        echo json_encode($output);
    }

    public function getAllDevices() 
    {
        if(request()->ajax())
        {
            // $builder = Device::query()->select('id', 'device_id');
            // return DataTables()->eloquent($builder)
            // ->make(true);


            return DataTables::of(Device::latest()->get())
                                ->addColumn('statusVal', function($data){
                                    return $data->status === 1 ? '<span style="color: green">Active</span>' : '<span style="color: red">In-active</span>';
                                })
                                ->addColumn('date', function($data){
                                    return date('Y-m-d', strtotime($data->created_at));
                                })
                                ->addColumn('action', function($data){
                                    $action = '<a
                                    href="configuration/'.$data->device_id.'"
                                    data-toggle="tooltip"
                                    title="Device Configuration"
                                    ><i
                                        class="fa fa-cog"
                                        aria-hidden="true"
                                        style="color: #039be5; font-size: 16px;"
                                    ></i></a
                                >&nbsp;&nbsp;&nbsp;&nbsp;
                                <a
                                    href="javascript:void(0)"
                                    data-toggle="tooltip"
                                    title="Device Details"
                                    data-device-id="'.$data->id.'"
                                    class="view_device"
                                    ><i
                                        class="fa fa-eye"
                                        aria-hidden="true"
                                        style="color: #039be5; font-size: 16px;"
                                    ></i></a
                                >&nbsp;&nbsp;&nbsp;&nbsp;
                                <a
                                    href="javascript:void(0)"
                                    data-toggle="tooltip"
                                    title="Edit device info"
                                    data-device-id="'.$data->id.'"
                                    class="edit_device"
                                    ><i
                                        class="fa fa-pencil-alt"
                                        aria-hidden="false"
                                        style="color: #039be5; font-size: 16px;"
                                    ></i></a
                                >&nbsp;&nbsp;&nbsp;&nbsp;
                                <a
                                    href="javascript:void(0)"
                                    data-toggle="tooltip"
                                    data-device-id="'.$data->id.'"
                                    class="edit_status"
                                    title="Deactivate device"
                                    ><i
                                        class="fa fa-minus-circle"
                                        aria-hidden="true"
                                        style="color: #d32f2f; font-size: 16px;"
                                    ></i
                                ></a>';
                                return $action;
                                })
                                ->rawColumns(['statusVal','date', 'action'])
                                ->make(true);
        }
    }

    public function editDeviceStatus(Request $request) 
    {
        $id = $request->get('id', '');
        $device = Device::find($id);
        $device->status = $device->status === 1 ? 0 : 1;
        $device->save();
    }

    public function configuration($id) 
    {
        $deviceDetails = Device::getDeviceConfigOnId($id);
        return view('deviceConfig', compact('devices'));
    }


}
