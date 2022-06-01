@extends('admin.index')
@section('content')


<!--main contents start-->
<main class="main-content">
    <!--page title start-->
    <div class="page-title">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8">
                    <h4 class="mb-0"> Dashboard</h4>
                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div class="col-4">
                    <div class="btn-group float-right ml-2">
                        <button class="btn btn-primary btn-sm dropdown-toggle mt-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Profile Settings</a>
                            <a class="dropdown-item" href="#">Data Settings</a>
                            <a class="dropdown-item" href="#">Notification Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Advanced Settings</a>
                        </div>
                    </div>

                    <div class="btn-group float-right">
                        <button class="btn btn-danger btn-sm dropdown-toggle mt-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quick Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--page title end-->


    <div class="container-fluid">

        <!--state widget start-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $registeruser=DB::table('users')->where('status',1)->orderBy('id','DESC')->get();
                        @endphp

                        <i class="icon-people text-primary f30" style="color: #36a2f5 !important;"></i>
                        <h6 class="mb-0 mt-3">Register Users</h6>
                        <p class="f12 mb-0 mt-1" style="color: red">{{ Count($registeruser)}} Users</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $activeuser=DB::table('users')->where('status',1)->orderBy('id','DESC')->get();
                        @endphp
                        <i class="icon-people text-primary f30"></i>
                        <h6 class="mb-0 mt-3">Active Users</h6>
                        <p class="f12 mb-0 mt-1" style="color: #00b400;">{{ Count($activeuser)}} Users</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $Inactiveuser=DB::table('users')->where('status',0)->orderBy('id','DESC')->get();
                        @endphp
                        <i class="icon-people text-primary f30"></i>
                        <h6 class="mb-0 mt-3">InActive Users</h6>
                        <p class="f12 mb-0 mt-1" style="color: red;">{{ Count($Inactiveuser)}} Users</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $totalOrder=DB::table('orderdetails')->get();
                        @endphp

                        <i class=" icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Total Order</h6>
                        <p class="f12 mb-0 mt-1" style="color: #00b400;">{{ Count($totalOrder)}} Order Placed</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $PandingOrder=DB::table('invoice')->where('status',0)->get();
                        @endphp
                        <i class=" icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Order Panding</h6>
                        <p class="f12 mb-0 mt-1" style="color: red">{{ Count($PandingOrder)}} Order Placed</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $ProcessingOrder=DB::table('invoice')->where('status',1)->get();
                        @endphp
                        <i class=" icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Order Processing</h6>
                        <p class="f12 mb-0 mt-1" style="color: #00b400;">{{ Count($ProcessingOrder)}} Order Placed</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $ShippingOrder=DB::table('invoice')->where('status',2)->get();
                        @endphp
                        <i class=" icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Order Shipping </h6>
                        <p class="f12 mb-0 mt-1" style="color: #00b400;">{{ Count($ShippingOrder)}} Order Placed</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card card-shadow">
                    <div class="card-body ">
                        @php
                        $CompletdOrder=DB::table('invoice')->where('status',3)->get();
                        @endphp
                        <i class=" icon-basket-loaded text-info f30"></i>
                        <h6 class="mb-0 mt-3">Order Completd</h6>
                        <p class="f12 mb-0 mt-1" style="color: #00b400;">{{ Count($CompletdOrder)}} Order Placed</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card card-shadow mb-4">
                    <div class="card-body pb-0 ">
                        <div class="btn-group float-right">
                            <div class="dropdown ">
                                <a href="#" class="btn btn-transparent default-color dropdown-hover p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class=" icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right ">
                                    <a class="dropdown-item" href="#"> <i class="icon-note text-info pr-2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="icon-close text-danger pr-2"></i> Delete</a>
                                    <a class="dropdown-item" href="#"><i class="icon-shield text-warning pr-2"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0 ">12083</h4>
                        <p class="">New Users</p>
                    </div>
                    <div class="">
                        <canvas id="myChart-light" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-shadow mb-4">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <div class="dropdown ">
                                <a href="#" class="btn btn-transparent default-color dropdown-hover p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class=" icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right ">
                                    <a class="dropdown-item" href="#"> <i class="icon-note text-info pr-2"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="icon-close text-danger pr-2"></i> Delete</a>
                                    <a class="dropdown-item" href="#"><i class="icon-shield text-warning pr-2"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">234</h4>
                        <p class="">New Orders</p>
                    </div>
                    <div class="px-">
                        <canvas id="myChart-tow-light" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-shadow">
                    <div class="card-body">
                        <div class="row pt-4 pb-3">
                            <div class="col-12">
                                <div class="float-right">
                                    <i class="f30 opacity-3 icon-basket-loaded"></i>
                                </div>
                                <h3 class="text-success">234</h3>
                                <p class="card-subtitle text-muted fw-500">New Orders</p>
                            </div>
                            <div class="col-12">
                                <div class="progress mt-3 mb-1" style="height: 6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 83%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                </div>
                                <div class="text-muted f12">
                                    <span>Progress</span>
                                    <span class="float-right">83%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!--main contents end-->














@endsection