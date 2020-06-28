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
                                                    12
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-success mr-2"
                                                        ><i
                                                            class="fa fa-arrow-up"
                                                        ></i>
                                                        2</span
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
                                                    4
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-success mr-2"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i>
                                                        8</span
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
                                                    5
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-success mr-2"
                                                        ><i
                                                            class="fas fa-arrow-up"
                                                        ></i>
                                                        3</span
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
                                                    18
                                                </div>
                                                <div
                                                    class="mt-2 mb-0 text-muted text-xs"
                                                >
                                                    <span
                                                        class="text-danger mr-2"
                                                        ><i
                                                            class="fas fa-arrow-down"
                                                        ></i>
                                                        2</span
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
                            <!-- Pie Chart -->
                           
                            <!-- Invoice Example -->
                            <div class="col-xl-12 col-lg-12 mb-12">
                                <div class="card">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                                    >
                                        <h6
                                            class="m-0 font-weight-bold text-primary"
                                        >
                                            Invoice
                                        </h6>
                                        <a
                                            class="m-0 float-right btn btn-danger btn-sm"
                                            href="#"
                                            >View More
                                            <i class="fas fa-chevron-right"></i
                                        ></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table
                                            class="table align-items-center table-flush"
                                        >
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Customer</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#">RA0449</a>
                                                    </td>
                                                    <td>Udin Wayang</td>
                                                    <td>Nasi Padang</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success"
                                                            >Delivered</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="btn btn-sm btn-primary"
                                                            >Detail</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#">RA5324</a>
                                                    </td>
                                                    <td>Jaenab Bajigur</td>
                                                    <td>Gundam 90' Edition</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-warning"
                                                            >Shipping</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="btn btn-sm btn-primary"
                                                            >Detail</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#">RA8568</a>
                                                    </td>
                                                    <td>Rivat Mahesa</td>
                                                    <td>Oblong T-Shirt</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-danger"
                                                            >Pending</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="btn btn-sm btn-primary"
                                                            >Detail</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#">RA1453</a>
                                                    </td>
                                                    <td>Indri Junanda</td>
                                                    <td>Hat Rounded</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-info"
                                                            >Processing</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="btn btn-sm btn-primary"
                                                            >Detail</a
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#">RA1998</a>
                                                    </td>
                                                    <td>Udin Cilok</td>
                                                    <td>Baby Powder</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success"
                                                            >Delivered</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="#"
                                                            class="btn btn-sm btn-primary"
                                                            >Detail</a
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer"></div>
                                </div>
                            </div>
                            <!-- Message From Customer-->
                           
                        <!--Row-->

                        
                    </div>
                    <!---Container Fluid-->
@endsection
