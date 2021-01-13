@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fleet Operators</h1>
          </div>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Fleet Operators</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Logo</th>
                      <th>Company Name</th>
                      <th>Company Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($fleetoperators as $fleet)
                    <tr>
                      <td>
                        <img style="width: 50px" src="{{url('../'.$fleet->image)}}">
                      </td>
                      <td>{{$fleet->c_name}}</td>
                      <td>{{$fleet->c_phone}}</td>
                      <td>{{$fleet->locationField}}</td>
                      <td>
                        <a href="{{url('/dashboard/fleetoperators/'.$fleet->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Import Excel</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/dashboard/importExcel') }}" enctype="multipart/form-data" id="regform">
         {{ csrf_field() }}
         <div class="form-group col-md-12">
            <label for="password-signup">Choose Excel</label>
            <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"class="form-control" id="password-signup" name="file" required="true">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <button type="submit" class="btn btn-primary w-80">Upload Products</button>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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