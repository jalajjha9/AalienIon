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

    <div class="card" style="margin-bottom: 20px;">
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
                        <input type="text" class="form-control config-control" id="charging__{{$i}}"
                            placeholder="">
                    </div>

                    <div class="form-group config-group">
                        <label class="config-label" for="discharging_{{$i}}">Discharging Thrashold</label>
                        <input type="text" class="form-control config-control" id="discharging_{{$i}}"
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
        
        <div class="form-group row">
            <div
                class="col-sm-12"
                style="text-align: center; margin-top: 30px;"
            >
                <button
                    type="submit"
                    name="submit"
                    class="btn btn-primary"
                >
                    Save Device Configuration
                </button>
            </div>
        </div>
        
    </div>

</div>

@endsection