@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-primary ">Active Designers</h6>            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Website</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($designers as $designer)
                    <tr>
                      
                      <td><a href="{{url('/dashboard/designerdetail/'.$designer->id)}}">{{$designer->c_name}} </a></td>
                      
                      <td>{{$designer->users['email']}}
                      </td>
                      <td>{{$designer->c_phone}}
                      </td>
                       <td><a href="{{$designer->comp_url}}">{{$designer->comp_url}} </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        @endsection
         @push('scripts')
<script src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function () {
    $.noConflict();
    var table = $('#dataTable').DataTable();
});</script>
  <script src="{{asset('admin-assets/js/demo/datatables-demo.js')}}"></script>

@endpush