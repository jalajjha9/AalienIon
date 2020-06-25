@extends('layouts.app') @section('content') @push('styles')
<link
    href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet"
/>
@endpush

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-size: 1.45rem;">
            Manage Devices
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Manage Devices
            </li>
        </ol>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
            >
                <h6 class="m-0 font-weight-bold text-primary">
                    List Of All Devices
                </h6>
            </div>
            <div class="table-responsive p-3">
                <table
                    class="table align-items-center table-flush table-hover"
                    id="dataTableHover"
                >
                    <thead class="thead-light" style="font-size: 15px;">
                        <tr>
                            <th style="color: #333333;">Device Id</th>
                            <th style="color: #333333;">Name</th>
                            <th style="color: #333333;">Phone No.</th>
                            <th style="color: #333333;">Date</th>
                            <th style="color: #333333;">Status</th>
                            <th style="color: #333333;"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit device modal starts -->
<div
    class="modal fade"
    id="editDeviceModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Update Device Information
                </h5>
                <!-- <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div
                    id="loading"
                    style="
                        display: block;
                        text-align: center;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    "
                >
                    <img src="../assets/img/loader.gif" style="width: 30px;" />
                </div>
                <div
                    id="edit-loading"
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
                    id="ajax-error"
                    style="
                        display: none;
                        text-align: center;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    "
                ></div>
                <div id="form-section" style="display: none;">
                    <form
                        name="edit_device"
                        method="POST"
                        action="{{ route('add-device') }}"
                        id="edit_device"
                    >
                        @csrf
                        <span id="form_output"></span>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label
                                    for="device_id"
                                    class="col-sm-4 col-form-label"
                                    >Device Id<span class="error-star">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        name="device_id"
                                        class="form-control"
                                        id="device_id"
                                        placeholder="Enter unique id"
                                        value=""
                                        readonly
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="device_type"
                                    class="col-sm-4 col-form-label"
                                    >Device Type<span class="error-star"
                                        >*</span
                                    >
                                </label>
                                <div class="col-sm-8">
                                    <select
                                        class="form-control"
                                        name="device_type"
                                        id="device_type"
                                        required
                                    >
                                        <option value="Automative"
                                            >Automative</option
                                        >
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="contact_name"
                                    class="col-sm-4 col-form-label"
                                    >Contact Name<span class="error-star"
                                        >*</span
                                    >
                                </label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        name="contact_name"
                                        class="form-control"
                                        id="contact_name"
                                        placeholder="Enter name"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="contact_email"
                                    class="col-sm-4 col-form-label"
                                    >Contact Email
                                </label>
                                <div class="col-sm-8">
                                    <input
                                        type="email"
                                        name="contact_email"
                                        class="form-control"
                                        id="contact_email"
                                        placeholder="Enter email id"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="contact_phone"
                                    class="col-sm-4 col-form-label"
                                    >Contact Phone<span class="error-star"
                                        >*</span
                                    >
                                </label>
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        name="contact_phone"
                                        class="form-control"
                                        id="contact_phone"
                                        placeholder="Enter contact no."
                                        minlength="10"
                                        maxlength="10"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="contact_address"
                                    class="col-sm-4 col-form-label"
                                    >Contact Address<span class="error-star"
                                        >*</span
                                    >
                                </label>
                                <div class="col-sm-8">
                                    <textarea
                                        class="form-control"
                                        name="contact_address"
                                        id="contact_address"
                                        rows="3"
                                        required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="eid" id="eid" />
                        <div
                            style="
                                text-align: right;
                                margin-top: 35px;
                                margin-right: 10px;
                            "
                        >
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View device modal starts -->
<div
    class="modal fade"
    id="viewDeviceModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    View Device Information
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div
                    id="loadingView"
                    style="
                        display: block;
                        text-align: center;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    "
                >
                    <img src="../assets/img/loader.gif" style="width: 30px;" />
                </div>
                <div
                    id="ajax-error"
                    style="
                        display: none;
                        text-align: center;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    "
                ></div>
                <div id="form-sectionView" style="display: none;">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label
                                for="device_idView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Device Id -
                            </label>
                            <div class="col-sm-8" id="device_idView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="device_statusView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Status -
                            </label>
                            <div class="col-sm-8" id="device_statusView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="device_typeView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Device Type -
                            </label>
                            <div class="col-sm-8" id="device_typeView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="contact_nameView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Contact Name -
                            </label>
                            <div class="col-sm-8" id="contact_nameView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="contact_emailView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Contact Email -
                            </label>
                            <div class="col-sm-8" id="contact_emailView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="contact_phoneView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Contact Phone -
                            </label>
                            <div class="col-sm-8" id="contact_phoneView"></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="contact_addressView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Contact Address -
                            </label>
                            <div
                                class="col-sm-8"
                                id="contact_addressView"
                            ></div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="created_atView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Created Date -
                            </label>
                            <div class="col-sm-8" id="created_atView"></div>
                        </div>
                        <div class="form-group row">
                            <label
                                for="updated_atView"
                                class="col-sm-4"
                                style="font-weight: bold;"
                                >Updated Date -
                            </label>
                            <div class="col-sm-8" id="updated_atView"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- device configuration modal starts -->
<div
    class="modal fade"
    id="configDeviceModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="configModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="configModalLabel">
                    Device Configuration
                </h5>
                <!-- <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div
                    id="loadingConfig"
                    style="
                        display: block;
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
            <form name="config_device"
                        method="POST"
                        id="config_device">
                        @csrf
                    <span id="form_outputConfig"></span>
                <div id="form-sectionConfig" style="display: none;">
                    <div style="margin-bottom: 20px;">
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
                                data-dismiss="modal"
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
                        
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

@endsection @section('extra-scripts')
<script src="{{
        asset('assets/vendor/datatables/jquery.dataTables.min.js')
    }}"></script>
<script src="{{
        asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')
    }}"></script>
@endsection @section('footer_scripts')
<script>
    $(document).ready(function () {
        $("body").tooltip({
            selector: '[data-toggle="tooltip"]',
            trigger: "hover",
        });

        window.addEventListener("click", function (event) {
            $(".tooltip").tooltip("hide");
        });

        var dt = $("#dataTableHover").DataTable({
            processing: true,
            serverSide: true,
            ajax: { url: "{{ route('get-all-devices') }}" },
            columns: [
                { data: "device_id" },
                { data: "contact_name" },
                { data: "contact_phone" },
                { data: "date" },
                { data: "statusVal" },
                { data: "action" },
            ],
            ordering: false,
            columnDefs: [{ orderable: false, targets: "_all" }],
        });

        $("#edit_device").on("submit", function (event) {
            $("#edit-loading").show();
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('edit-device') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    $("#edit-loading").hide();
                    if (data.error.length > 0) {
                        var error_html = "";
                        for (
                            var count = 0;
                            count < data.error.length;
                            count++
                        ) {
                            error_html +=
                                '<div class="alert alert-danger">' +
                                data.error[count] +
                                "</div>";
                        }
                        $("#editDeviceModal").scrollTop(0);
                        $("#form_output").html(error_html);
                    } else {
                        $("#editDeviceModal").scrollTop(0);
                        $("#form_output").html(data.success);
                        dt.ajax.reload();
                        setTimeout(() => {
                            $("#form_output").html("");
                            $("#editDeviceModal").modal("hide");
                        }, 3000);
                    }
                },
                error: function (err) {
                    $("#edit-loading").hide();
                    var error_html =
                        '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
                    $("#form_output").html(error_html);
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
                        $("#configDeviceModal").scrollTop(0);
                        $("#form_outputConfig").html(data.error);
                    } else {
                        $("#configDeviceModal").scrollTop(0);
                        $("#form_outputConfig").html(data.success);
                        setTimeout(() => {
                            $("#form_outputConfig").html("");
                            $("#configDeviceModal").modal("hide");
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
        

        $(document).on("click", ".edit_status", function () {
            var id = $(this).attr("data-device-id");
            $.ajax({
                url: "{{route('edit-device-status')}}",
                method: "get",
                data: { id: id },
                success: function (data) {
                    dt.ajax.reload();
                },
                error: function (err) {},
            });
        });
    });

    $(document).on("click", ".edit_device", function () {
        $("#ajax-error").hide();
        var id = $(this).attr("data-device-id");
        console.log(id);
        $("#editDeviceModal").modal({
            backdrop: "static",
            keyboard: false,
        });
        $.ajax({
            url: "{{route('get-device')}}",
            method: "get",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $("#loading").hide();
                $("#form-section").show();
                if (data) {
                    $("#eid").val(id);
                    $("#device_id").val(data.device_id);
                    $("#device_type").val(data.device_type).change();
                    $("#contact_name").val(data.contact_name);
                    $("#contact_email").val(data.contact_email);
                    $("#contact_phone").val(data.contact_phone);
                    $("#contact_address").val(data.contact_address);
                } else {
                    $("#ajax-error").text("No data found to update");
                    $("#ajax-error").show();
                }
            },
            error: function (err) {
                $("#ajax-error").text("Something went wrong. Please try again");
                $("#ajax-error").show();
            },
        });
    });

    $(document).on("click", ".view_device", function () {
        $("#ajax-errorView").hide();
        var id = $(this).attr("data-device-id");
        console.log(id);
        $("#viewDeviceModal").modal({
            backdrop: "static",
            keyboard: false,
        });
        $.ajax({
            url: "{{route('get-device')}}",
            method: "get",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $("#loadingView").hide();
                $("#form-sectionView").show();
                if (data) {
                    var status =
                        data.status === 1
                            ? '<span style="color: green">Active</span>'
                            : '<span style="color: red">In-active</span>';
                    $("#device_idView").text(data.device_id);
                    $("#device_statusView").html(status);
                    $("#device_typeView").text(data.device_type);
                    $("#contact_nameView").text(data.contact_name);
                    $("#contact_emailView").text(data.contact_email);
                    $("#contact_phoneView").text(data.contact_phone);
                    $("#contact_addressView").text(data.contact_address);
                    $("#created_atView").text(data.created_at);
                    $("#updated_atView").text(data.updated_at);
                } else {
                    $("#ajax-errorView").text("No data found to update");
                    $("#ajax-errorView").show();
                }
            },
            error: function (err) {
                $("#ajax-error").text("Something went wrong. Please try again");
                $("#ajax-error").show();
            },
        });
    });

    $(document).on("click", ".config_device", function () {
        $("#ajax-errorView").hide();
        var id = $(this).attr("data-device-id");
        console.log(id);
        $("#configDeviceModal").modal({
            backdrop: "static",
            keyboard: false,
        });
        $.ajax({
            url: "{{route('config-device')}}",
            method: "get",
            data: { id: id },
            dataType: "json",
            success: function (data) {
                $("#loadingConfig").hide();
                $("#form-sectionConfig").show();
                if (data) {
                    if(data.length) {
                        console.log(data);
                        for(var i = 0; i < 16;i++) {
                            var cid = i+1;
                            $("#charging_"+cid).val(data[i].charging_thrashold);
                            $('#discharging_'+cid).val(data[i].discharge_thrashold);
                            $('#device_id_config').val(id);
                        }
                    } else {
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
</script>
@endsection
