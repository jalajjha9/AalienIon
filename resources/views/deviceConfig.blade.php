@extends('layouts.app') @section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-size: 1.45rem;">
            Configure Device
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Configure Device
            </li>
        </ol>
    </div>

    <div class="col-md-6 mx-auto">
        <div class="dropdown-menu-right p-3 shadow animated--grow-in dashboard-search-bar" style="margin-bottom: 20px">
            <form class="navbar-search" id="device-config-search">
                <div class="input-group">
                    <input
                        type="text"
                        name="device_id_search"
                        class="form-control bg-light border-1 small"
                        placeholder="Enter Device Id to Configure"
                        minlength="10"
                        maxlength="10"
                        style="border-color: #d1d3e2;"
                        id="device_id_search"
                        required
                    />
                    <div class="input-group-append">
                        <button
                            class="btn btn-primary"
                            type="submit"
                        >
                            <i
                                class="fas fa-search fa-sm"
                            ></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div
        id="loadingConfig"
        style="
            display: none;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        "
    >
        <img src="../assets/img/loader.gif" style="width: 30px;" />
    </div>
    <div
        id="config-loading"
        style="
            display: none;
            position: fixed;
            top: 40%;
            left: 50%;
            width: 100%;
            height: 100%;
            z-index: 2;
        "
    >
        <img src="../assets/img/loader.gif" style="width: 40px;" />
    </div>
    <div
        id="ajax-errorConfig"
        style="
            display: none;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        "
    ></div>

    <div class="card" style="margin-bottom: 20px; display: none;" id="device-config-div">
    <form name="config_device"
                        method="POST"
                        id="config_device">
                        @csrf
                    <span id="form_outputConfig"></span>
        <div class="device-config-container">
        <?php
            for($i = 1; $i <= 16; $i++) {
        ?>

                <div class="col-md-3" style="padding:5px">
                    <div class="config-card">
                        <div style="text-align: center;font-weight: bold">Battery # {{$i}}</div>
                        <hr style="margin-top: 5px;margin-bottom: 10px;" />
    
                        <div class="form-group config-group">
                            <label class="config-label" for="charging_{{$i}}">Charging Thrashold</label>
                            <input type="text" name="charging[]" class="form-control config-control" id="charging_{{$i}}"
                                placeholder="">
                        </div>
    
                        <div class="form-group config-group">
                            <label class="config-label" for="discharging_{{$i}}">Discharging Thrashold</label>
                            <input type="text" name="discharging[]" class="form-control config-control" id="discharging_{{$i}}"
                                placeholder="">
                        </div>
                        
                    </div>
                </div>

        <?php
                if($i%4 === 0) {
        ?>
                </div>
                <div class="device-config-container">
        <?php
                }
            }
        ?>
        </div>
        
        <input type="hidden" name="device_id" id="device_id_config">
        <div class="form-group row">
            <div
                class="col-sm-12"
                style="text-align: center; margin-top: 30px;"
            >
            <button
                type="button"
                class="btn btn-secondary"
                id="closeConfig"
            >
                Close
            </button>
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Device Configuration
                </button>
            </div>
        </div>
    </form>
    </div>

</div>

@endsection

@section('footer_scripts')
<script>
    $(document).ready(function () {
        $("#closeConfig").on("click", function (event) {
            $("#device-config-div").hide();
        });

        $("#device-config-search").on("submit", function (event) {
            $("#ajax-errorConfig").hide();
            $("#device-config-div").hide();
            $('#loadingConfig').show();
            
            event.preventDefault();
            var id = $('#device_id_search').val();
            $.ajax({
                url: "{{route('config-device')}}",
                method: "get",
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    $("#loadingConfig").hide();
                    if (data) {
                        $("#device-config-div").show();
                        if(data.length) {
                            for(var i = 0; i < 16;i++) {
                                var cid = i+1;
                                $("#charging_"+cid).val(data[i].charging_thrashold);
                                $('#discharging_'+cid).val(data[i].discharge_thrashold);
                            }
                            $('#device_id_config').val(id);
                        } else {
                            for(var i = 0; i < 16;i++) {
                                var cid = i+1;
                                $("#charging_"+cid).val('');
                                $('#discharging_'+cid).val('');
                            }
                            $('#device_id_config').val(id);
                        }
                    } else {
                        $("#ajax-errorConfig").text("No data found for the device you searched");
                        $("#ajax-errorConfig").show();
                    }
                },
                error: function (err) {
                    $("#ajax-errorConfig").text("Something went wrong. Please try again");
                    $("#ajax-errorConfig").show();
                },
            });
        });

        $("#config_device").on("submit", function (event) {
            $("#config-loading").show();
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('update-config-device') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    $("#config-loading").hide();
                    if (data.error) {
                        $(window).scrollTop(0);
                        $("#form_outputConfig").html(data.error);
                    } else {
                        $(window).scrollTop(0);
                        $("#form_outputConfig").html(data.success);
                        setTimeout(() => {
                            $("#form_outputConfig").html("");
                        }, 3000);
                    }
                },
                error: function (err) {
                    $("#config-loading").hide();
                    var error_html =
                        '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
                    $("#form_outputConfig").html(error_html);
                },
            });
        });

    });
</script>
@endsection