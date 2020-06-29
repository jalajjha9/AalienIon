@extends('layouts.app')

@section('content')


<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
                        <div
                            class="d-sm-flex align-items-center justify-content-between mb-4"
                        >
                            <h1
                                class="h3 mb-0 text-gray-800"
                                style="font-size: 1.45rem;"
                            >
                                Dashboard
                            </h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li
                                    class="breadcrumb-item active"
                                    aria-current="page"
                                >
                                    Dashboard
                                </li>
                            </ol>
                        </div>

                        <div class="row mb-3">
                            <!-- Total Device -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                                >
                                                Total Customers
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                    {{$dashboardInfo[0]->all_total}}
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-success mr-2"
                                                        ><i
                                                            class="fa fa-arrow-up"
                                                        ></i>
                                                        {{$dashboardInfo[0]->month_total}}</span
                                                    >
                                                    <span
                                                        >added last month</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-users fa-2x text-info"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Configured -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                                >
                                                Total Devices
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                {{$dashboardInfo[1]->all_total}}
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-success mr-2"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i>
                                                        {{$dashboardInfo[1]->month_total}}</span
                                                    >
                                                    <span
                                                        >added last month</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-calendar fa-2x text-primary"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- Total Users -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                                >
                                                Configured Devices
                                                </div>
                                                <div
                                                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                                >
                                                {{$dashboardInfo[2]->all_total}}
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="<?php $arrow = $dashboardInfo[1]->all_total > $dashboardInfo[2]->all_total ? 'text-danger' : 'text-success'; echo $arrow; ?> mr-2"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i>
                                                        {{$dashboardInfo[1]->all_total - $dashboardInfo[2]->all_total}}</span
                                                    >
                                                    <span
                                                        >not yet configured</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-cog fa-2x text-info"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Monitored Devices -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col mr-2">
                                                <div
                                                    class="text-xs font-weight-bold text-uppercase mb-1"
                                                >
                                                    Monitored Devices
                                                </div>
                                                <div
                                                    class="h5 mb-0 font-weight-bold text-gray-800"
                                                >
                                                    {{$dashboardInfo[3]->all_total}}
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="<?php $arrow = $dashboardInfo[1]->all_total > $dashboardInfo[3]->all_total ? 'text-danger' : 'text-success'; echo $arrow; ?> mr-2"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i>
                                                        {{$dashboardInfo[1]->all_total - $dashboardInfo[3]->all_total}}</span
                                                    >
                                                    <span>not yet monitored</span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i
                                                    class="fas fa-podcast fa-2x text-warning"
                                                ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 mx-auto">
                                <div class="dropdown-menu-right p-3 shadow animated--grow-in dashboard-search-bar" style="margin-bottom: 20px">
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="device_id_search"
                                            class="form-control bg-light border-1 small"
                                            placeholder="Enter Device Id to Configure"
                                            minlength="10"
                                            maxlength="10"
                                            id="device_id_search"
                                            required
                                        />
                                        <div class="input-group-append">
                                            <button
                                                class="btn btn-primary"
                                                type="submit"
                                            >
                                               Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: center;padding-bottom: 20px;font-weight: bold;font-size: 19px;">Monitoring Information</div>
                            <!--- Monitoring Section -->
                            <?php 
                                for($i = 0; $i <16; $i++)
                                {
                            ?>
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body" style="padding: 10px 10px;">
                                                <div style="text-align:center;font-weight: bold;">Battery #<?php echo $i+1; ?></div>
                                                <hr style="margin: 0 0 10px 0;" />
                                                <div class="row align-items-center" style="font-size: 13px;">
                                                    <div class="col mr-2">
                                                        <p style="margin: 0px;"><span style="font-weight: bold;color: #696969;">Charge Status :</span> On</p>
                                                        <p style="margin: 0px;"><span style="font-weight: bold;color: #696969;">Voltage :</span> 30%</p>
                                                        <p style="margin: 0px;"><span style="font-weight: bold;color: #696969;">Overall Voltage :</span> 20%</p>
                                                        <p style="margin: 0px;"><span style="font-weight: bold;color: #696969;">Temp Pack :</span> 4.3</p>
                                                        <p style="margin: 0px;"><span style="font-weight: bold;color: #696969;">Discharge Status :</span> Off</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <i
                                                            class="fas fa-podcast fa-3x text-warning"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                                
                                <div class="col-md-12" style="text-align: center;padding-bottom: 20px;font-weight: bold;font-size: 19px;">Recent Monitoring History</div>      
                               
                            

                            <!-- Pie Chart -->
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Monitoring Chart</h6>
                                    </div>
                                    <div class="card-body">
                                    <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myAreaChart" width="1906" height="640" class="chartjs-render-monitor" style="display: block; height: 320px; width: 953px;"></canvas>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Example -->
                            
                            <!-- Message From Customer-->
                           
                        <!--Row-->

                        
                    </div>
                    <!---Container Fluid-->
@endsection
