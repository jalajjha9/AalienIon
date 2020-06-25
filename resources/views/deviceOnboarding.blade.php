@extends('layouts.app') @section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="font-size: 1.45rem;">
            Device Onboarding
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Device Onboarding
            </li>
        </ol>
    </div>

    <div class="card mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
        >
            <h6 class="m-0 font-weight-bold text-primary">
                Add New Device Information
            </h6>
        </div>
        @if(session()->has('successMessage'))
        <div class="col-sm-6">
            <div class="alert alert-success" role="alert">
                {{ session()->get('successMessage') }}
            </div>
        </div>
        @endif @if(session()->has('errorMessage'))
        <div class="col-sm-6">
            <div class="alert alert-danger" role="alert">
                {{ session()->get('errorMessage') }}
            </div>
        </div>
        @endif @if($errors->any())
        <div class="col-sm-6">
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div class="card-body">
            <form
                name="add_device"
                method="POST"
                action="{{ route('add-device') }}"
            >
                @csrf
                <div class="form-group row">
                    <label for="inputDeviceId" class="col-sm-2 col-form-label"
                        >Device Id<span class="error-star">*</span> :
                    </label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            name="device_id"
                            class="form-control"
                            id="inputDeviceId"
                            placeholder="Enter unique id"
                            value="{{ old('device_id') }}"
                            required
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="selectDeviceType"
                        class="col-sm-2 col-form-label"
                        >Device Type<span class="error-star">*</span> :
                    </label>
                    <div class="col-sm-4">
                        <select
                            class="form-control"
                            name="device_type"
                            id="selectDeviceType"
                            required
                        >
                            <option value="Automative">Automative</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="inputContactName"
                        class="col-sm-2 col-form-label"
                        >Contact Name<span class="error-star">*</span> :
                    </label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            name="contact_name"
                            class="form-control"
                            id="inputContactName"
                            placeholder="Enter name"
                            required
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="inputContactEmail"
                        class="col-sm-2 col-form-label"
                        >Contact Email :
                    </label>
                    <div class="col-sm-4">
                        <input
                            type="email"
                            name="contact_email"
                            class="form-control"
                            id="inputContactEmail"
                            placeholder="Enter email id"
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="inputContactPhone"
                        class="col-sm-2 col-form-label"
                        >Contact Phone<span class="error-star">*</span> :
                    </label>
                    <div class="col-sm-4">
                        <input
                            type="text"
                            name="contact_phone"
                            class="form-control"
                            id="inputContactPhone"
                            placeholder="Enter contact no."
                            minlength="10"
                            maxlength="10"
                            required
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="inputContactAddress"
                        class="col-sm-2 col-form-label"
                        >Contact Address<span class="error-star">*</span> :
                    </label>
                    <div class="col-sm-4">
                        <textarea
                            class="form-control"
                            name="contact_address"
                            id="inputContactAddress"
                            rows="3"
                            required
                        ></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div
                        class="col-sm-6"
                        style="text-align: center; margin-top: 30px;"
                    >
                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary"
                        >
                            Submit Device
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
