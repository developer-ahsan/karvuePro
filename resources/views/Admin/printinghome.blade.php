@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
            <!-- <h4 style="text-transform: capitalize;">Welcome {{Auth::user()->f_name}} {{Auth::user()->l_name}} ! {{Auth::user()->user_type}}</h4> -->
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Designers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['Designer']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-snowflake fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Commercial Fleet Operator</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['Commercialfleets']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            

<div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Advertisers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['CustomersPortal']}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        @endsection