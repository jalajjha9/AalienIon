<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\User;

class HomeController extends Controller
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
        $dashboardInfo = Device::getDetailsForDashboard();
        //print_r($dashboardInfo);die;
        $viewArray = [
            'dashboardInfo' => $dashboardInfo
        ];
        return view('home', $viewArray);
    }
}
