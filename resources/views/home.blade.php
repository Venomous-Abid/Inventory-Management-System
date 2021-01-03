@extends('layouts.app')

@section('content')
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <h4 class="section-subtitle"><b>Recent</b> Updates</h4>
        <div class="row">
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-user-secret"></i> Managers </h1>
                            <h4 class="subtitle color-lighter-1">{{ $getManagerCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-user-plus"></i> Staffs </h1>
                            <h4 class="subtitle">{{ $getStaffCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-cutlery"></i> Products </h1>
                            <h4 class="subtitle color-darker-1">{{ $getProCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title"> <i class="fa fa-shopping-cart"></i> Stocks </h1>
                            <h4 class="subtitle">{{ $getStockCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-glass"></i> Category </h1>
                            <h4 class="subtitle color-lighter-1">{{ $getCatCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-glass"></i> Sub-Category </h1>
                            <h4 class="subtitle">{{ $getSubcatCount }}</h4>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
            </div>
        </div>
    </div>

  </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>


@endsection
