<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Device extends Model {
    protected $fillable = [
        'device_id', 'device_type', 'contact_name', 'contact_email', 'contact_phone', 'contact_address'
    ];

    public static function getDeviceConfigOnId($id) 
    {
        $config = DB::table('device_config')->where(['device_id' => $id])->orderBy('id', 'ASC')->get();
        return $config;
    }
}