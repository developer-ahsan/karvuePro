@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-primary ">Fleet Vehicles</h6>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"></i> Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Type</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                      <td>{{$vehicle->id}}</td>
                      <td>{{$vehicle->type}}</td>
                      <td>{{$vehicle->count}}</td>
                      <td>
                        <!-- <a href="{{url('/dashboard/fleetvehiclesdel/'.$vehicle->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a> -->
                        <a href="{{url('/dashboard/fleetvehiclesdel/'.$vehicle->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->
        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Vehicle</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/dashboard/addnewVehicle') }}" enctype="multipart/form-data" id="regform">
         {{ csrf_field() }}
         <div class="form-group col-md-12">
            <label for="password-signup">Type</label>
            <input class="form-control" type="text" name="type" required="true">
        </div>
        <div class="form-group col-md-12">
            <label for="password-signup">Quantity</label>
            <input class="form-control" type="number" name="quan" required="true">
        </div>
        <button type="submit" class="btn btn-primary w-80">Add New</button>
        </form>
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