@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-primary ">Services Plan</h6>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"></i> Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Plan</th>
                      <th>Price</th>
                      <th>Revisions</th>
                      <th># of Designs</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($data['basic'])
                    <tr>
                      <td>{{$data['basic']->type}}</td>
                      <td>{{$data['basic']->price}}</td>
                      <td>{{$data['basic']->revisions}}</td>
                      <td>{{$data['basic']->number_of_designs}}</td>
                      <td>
                        <a href="{{url('/dashboard/designerServicePlansdel/'.$data['basic']->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endif
                    @if($data['standard'])
                    <tr>
                      <td>{{$data['standard']->type}}</td>
                      <td>{{$data['standard']->price}}</td>
                      <td>{{$data['standard']->revisions}}</td>
                      <td>{{$data['standard']->number_of_designs}}</td>
                      <td>
                        <a href="{{url('/dashboard/designerServicePlansdel/'.$data['standard']->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endif
                    @if($data['premium'])
                    <tr>
                      <td>{{$data['premium']->type}}</td>
                      <td>{{$data['premium']->price}}</td>
                      <td>{{$data['premium']->revisions}}</td>
                      <td>{{$data['premium']->number_of_designs}}</td>
                      <td>
                        <a href="{{url('/dashboard/designerServicePlansdel/'.$data['premium']->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endif
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
        <h4 class="modal-title">Add New Plan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/dashboard/addnewServicePlan') }}" enctype="multipart/form-data" id="regform">
         {{ csrf_field() }}
         <div class="form-group col-md-12">
            <label for="password-signup">Choose Type</label>
            <select class="form-control" name="plan" required="true">
                <option value="Basic" selected="true">Basic</option>
                <option value="Standard">Standard</option>
                <option value="Premium">Premium</option>
            </select>        
          </div>
          <div class="form-row">
        <div class="form-group col-md-6">
            <label for="password-signup">Number Of Designs</label>
            <input class="form-control" type="number" name="designs" >
        </div>
        <div class="form-group col-md-6">
            <label for="password-signup">Revisions</label>
            <input class="form-control" type="number" name="revisions" >
        </div>
        </div>
        <div class="form-group col-md-6">
            <label for="password-signup">Price</label>
            <input class="form-control" type="number" name="price" >
        </div>
        <div class="form-group col-md-12">
            <label for="password-signup">Detail</label>
            <textarea class="form-control" type="number" name="detail" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-80">Add </button>
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