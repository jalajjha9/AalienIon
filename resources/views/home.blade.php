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



                            <div class="col-md-12">
                            <form name="dashboard_search" id="dashboard_search" method="POST">
                            @csrf
                                <div class="dropdown-menu-right p-3 shadow animated--grow-in dashboard-search-bar" style="margin-bottom: 20px">
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="device_id_search"
                                            class="form-control bg-light border-1 small"
                                            placeholder="Enter Device Id To Get Monitoring Details"
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
                                </form>
                            </div>

                            <div class="col-md-12" id="loadingConfig" style="display: none;text-align: center;margin-top: 40px;margin-bottom: 40px;">
                                <img src="../assets/img/loader.gif" style="width: 30px;" />
                            </div>

                            <div class="col-md-12" id="ajax-errorConfig" style="display: none;text-align: center;margin-top: 40px;margin-bottom: 40px;color: red">
                                <img src="../assets/img/loader.gif" style="width: 30px;" />
                            </div>


                            <div class="col-md-12" id="monitor-title" style="text-align: center;padding-bottom: 20px;font-weight: bold;font-size: 19px;display: none;">Monitoring Information</div>
                            
                            

                            <!--- Monitoring Section -->
                            <div class="col-md-12">
                                <div class="row justify-content-md-center" style="display: none;" id="device_block_div">
                                    <div class="col-xl-3 col-md-6 mb-4 ">
                                        <div class="card h-100">
                                            <div class="card-body" style="padding: 10px 10px;">
                                                <div style="text-align:center;font-weight: bold;display: none;" id="device_block_text">Device Info</div>
                                                <hr style="margin: 0 0 10px 0;" />
                                                <div class="row align-items-center" style="font-size: 13px;">
                                                    <div class="col" id="device_block">
                                                        <!-- <p class="monitor-block-p"><span class="monitor-block-text">Device Id :</span> 20%</p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Overall Voltage :</span> 20%</p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Temp Pack :</span> 4.3</p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none" id="monitoring-block-div">
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
                                                    <div class="col mr-2" id="battery_block_{{$i+1}}">
                                                        <!-- <p class="monitor-block-p"><span class="monitor-block-text">Charge Status :</span> <span style="color: green">On</span></p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Voltage :</span> 30%</p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Overall Voltage :</span> 20%</p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Temp Pack :</span> 4.3</p>
                                                        <p class="monitor-block-p"><span class="monitor-block-text">Discharge Status :</span> <span style="color: red">Off</span></p> -->
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

                                
                              </div>
                            </div>  

                            <div class="col-md-12" id="monitor_table_text" style="display: none;text-align: center;padding-bottom: 20px;font-weight: bold;font-size: 19px;margin-top: 40px;">Recent Monitoring History</div>      
                            <div class="col-md-12">
                                <div class="card">
                                    <table class="table" id="monitor_table" style="display: none">
                                        <thead>
                                            <tr style="background-color: #EF5350; border-color: #EF5350;color: #ffffff">
                                                <th style="border-bottom: 2px solid #EF5350;">Device Id</th>
                                                <th style="border-bottom: 2px solid #EF5350;">Overall Voltage</th>
                                                <th style="border-bottom: 2px solid #EF5350;">Temp Pack</th>
                                                <th style="border-bottom: 2px solid #EF5350;">Added Time</th>
                                                <th style="border-bottom: 2px solid #EF5350;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="monitor_tbody"></tbody>
                                    </table>
                                </div>
                            </div>
                            

                            <!-- Pie Chart -->
                            <div class="col-lg-12" style="margin-top: 30px;">
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

@section('extra-scripts')
<script src="{{
        asset('assets/js/moment.min.js')
    }}"></script>
@endsection

@section('footer_scripts')

<script>
    $(document).ready(function () {
        $('#dashboard_search').on('submit', function(event) {
            event.preventDefault();
            var id = $('#device_id_search').val();
            $("#ajax-errorConfig").hide();
            $('#monitor-title').hide();
            $("#monitoring-block-div").hide();
            $('#device_block_text').hide();
            $('#device_block_div').hide();
            $('#monitor_table').hide();
            $('#monitor_table_text').hide();
            $('#loadingConfig').show();
            
            $.ajax({
                url: "{{route('monitoring-search')}}",
                method: "post",
                data: { _token: "{{ csrf_token() }}", id: id },
                dataType: "json",
                success: function (data) {
                    $("#loadingConfig").hide();
                    if (data) {
                        var dataCount = data.length;
                        if(dataCount) {
                            $('#monitor-title').show();
                            $("#monitoring-block-div").show();
                            $('#device_block_text').show();
                            $('#device_block_div').show();
                            var blockHtml = '<p class="monitor-block-p"><span class="monitor-block-text">Device Id :</span> '+id+'</p>';
                            blockHtml += '<p class="monitor-block-p"><span class="monitor-block-text">Overall Voltage :</span> '+data[0].battery_pack_voltage+'</p>';
                            blockHtml += '<p class="monitor-block-p"><span class="monitor-block-text">Temp Pack :</span> '+data[0].battery_pack_temp+'</p>';
                            $('#device_block').html(blockHtml);
                            var j = 1;
                            for(var i = 15; i >= 0;i--) {
                                var chargeStatus = '';
                                var dischargeStatus = '';
                                var block = '';
                                if(data[i].charge_status === null) {
                                    chargeStatus = '<span style="color: red">n/a</span>';
                                } else if(data[i].charge_status === 1) {
                                    chargeStatus = '<span style="color: green">On</span>';
                                } else {
                                    chargeStatus = '<span style="color: red">Off</span>';
                                }

                                if(data[i].discharge_status === null) {
                                    dischargeStatus = '<span style="color: red">n/a</span>';
                                } else if(data[i].discharge_status === 1) {
                                    dischargeStatus = '<span style="color: green">On</span>';
                                } else {
                                    dischargeStatus = '<span style="color: red">Off</span>';
                                }

                                var voltage = !data[i].battery_voltage ? '<span style="color: red">n/a</span>' : data[i].battery_voltage;

                                block += '<p class="monitor-block-p"><span class="monitor-block-text">Voltage :</span> '+voltage+'</p>';
                                block += '<p class="monitor-block-p"><span class="monitor-block-text">Charge Status :</span> '+chargeStatus+'</p>';
                                block += '<p class="monitor-block-p"><span class="monitor-block-text">Discharge Status :</span> '+dischargeStatus+'</p>';
                                $('#battery_block_'+j).html(block);
                                j++;
                            }
                            
                            var row = '';
                            for(var i = 0; i < dataCount; i = i+16) {
                                var time = moment(data[i].created_at).local().format('YYYY-MM-DD h:mma');
                                row += '<tr style="font-size: 14px;">';
                                row += '<td>'+id+'</td>';
                                row += '<td>'+data[i].battery_pack_voltage+'</td>';
                                row += '<td>'+data[i].battery_pack_temp+'</td>';
                                row += '<td>'+time+'</td>';
                                row += '<td><a href="javascript:void(0)" data-monitor-id="'+data[i].id+'" class="view-monitor"><i class="fa fa-eye" aria-hidden="true" style="color: #039be5; font-size: 17px;"></i></a></td>';
                                row += '</tr>';
                            }

                            $('#monitor_table_text').show();
                            $('#monitor_table').show();
                            $('#monitor_tbody').html(row);
                        } else {
                            $("#loadingConfig").hide();
                            $("#ajax-errorConfig").text("No data found for the device you searched");
                            $("#ajax-errorConfig").show();
                        }
                    } else {
                        $("#loadingConfig").hide();
                        $("#ajax-errorConfig").text("No data found for the device you searched");
                        $("#ajax-errorConfig").show();
                    }
                },
                error: function (err) {
                    $("#loadingConfig").hide();
                    $("#ajax-errorConfig").text("Something went wrong. Please try again");
                    $("#ajax-errorConfig").show();
                },
            });
        });
    });


    $(document).on("click", ".view-monitor", function () {
        var id = $(this).attr('data-monitor-id');
        //$("#loadingConfig").scrollTop(0);
        $(window).scrollTop($('#dashboard_search').offset().top);
        $('#ajax-errorConfig').hide();
        $("#loadingConfig").show();
        $('#monitor-title').hide();
        $("#monitoring-block-div").hide();
        $('#device_block_text').hide();
        $('#device_block_div').hide();
        $.ajax({
            url: "{{route('monitor-data-view')}}",
            method: "get",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $("#loadingConfig").hide();
                if (data) {
                    var dataCount = data.length;
                    if(dataCount) {
                        $('#monitor-title').show();
                        $("#monitoring-block-div").show();
                        $('#device_block_text').show();
                        $('#device_block_div').show();
                        var blockHtml = '<p class="monitor-block-p"><span class="monitor-block-text">Device Id :</span> '+data[0].device_id+'</p>';
                        blockHtml += '<p class="monitor-block-p"><span class="monitor-block-text">Overall Voltage :</span> '+data[0].battery_pack_voltage+'</p>';
                        blockHtml += '<p class="monitor-block-p"><span class="monitor-block-text">Temp Pack :</span> '+data[0].battery_pack_temp+'</p>';
                        $('#device_block').html(blockHtml);
                        for(var i = 0; i < 16; i++) {
                            var cid = i+1;
                            var chargeStatus = '';
                            var dischargeStatus = '';
                            var block = '';
                            if(data[i].charge_status === null) {
                                chargeStatus = '<span style="color: red">n/a</span>';
                            } else if(data[i].charge_status === 1) {
                                chargeStatus = '<span style="color: green">On</span>';
                            } else {
                                chargeStatus = '<span style="color: red">Off</span>';
                            }

                            if(data[i].discharge_status === null) {
                                dischargeStatus = '<span style="color: red">n/a</span>';
                            } else if(data[i].discharge_status === 1) {
                                dischargeStatus = '<span style="color: green">On</span>';
                            } else {
                                dischargeStatus = '<span style="color: red">Off</span>';
                            }

                            var voltage = !data[i].battery_voltage ? '<span style="color: red">n/a</span>' : data[i].battery_voltage;

                            block += '<p class="monitor-block-p"><span class="monitor-block-text">Voltage :</span> '+voltage+'</p>';
                            block += '<p class="monitor-block-p"><span class="monitor-block-text">Charge Status :</span> '+chargeStatus+'</p>';
                            block += '<p class="monitor-block-p"><span class="monitor-block-text">Discharge Status :</span> '+dischargeStatus+'</p>';
                            $('#battery_block_'+cid).html(block);
                            j++;
                        }
                    } else {
                        $("#loadingConfig").hide();
                        $("#ajax-errorConfig").text("No data found for the device you searched");
                        $("#ajax-errorConfig").show();
                    }
                } else {
                    $("#loadingConfig").hide();
                    $("#ajax-errorConfig").text("No data found for the device you searched");
                    $("#ajax-errorConfig").show();
                }
            },
            error: function (err) {
                $("#loadingConfig").hide();
                $("#ajax-errorConfig").text("Something went wrong. Please try again");
                $("#ajax-errorConfig").show();
            },
        });
    });
</script>

@endsection
