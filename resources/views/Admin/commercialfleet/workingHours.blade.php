@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
        <div class="container-fluid">
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
              <h6 class="m-0 font-weight-bold text-primary ">Business Hours</h6>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"></i> Add New</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>WeekDays</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Holiday</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($workingHours as $workingHour)
                    <tr>
                      <td>{{$workingHour->week_day}}</td>
                      <td>{{$workingHour->start_time}}</td>
                      <td>{{$workingHour->end_time}}</td>
                      @if($workingHour->holiday == 0) 
                      <td>NO</td>
                      @else 
                      <td>Yes</td>
                      @endif
                      <td>
                        <!-- <a href="{{url('/dashboard/fleetvehiclesdel/'.$workingHour->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a> -->
                        <a href="{{url('/dashboard/workingHoursdel/'.$workingHour->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title">Add New Time</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/dashboard/addnewworkingHours') }}" enctype="multipart/form-data" id="regform">
         {{ csrf_field() }}
         <div class="form-group col-md-12">
            <label for="password-signup">Choose Day</label>
            <select class="form-control" name="day" required="true">
                <option value="Monday" selected="true">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>        
          </div>
          <div class="form-row">
        <div class="form-group col-md-6">
            <label for="password-signup">Start Time</label>
            <input class="form-control" type="time" name="start" >
        </div>
        <div class="form-group col-md-6">
            <label for="password-signup">End Time</label>
            <input class="form-control" type="time" name="end" >
        </div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="holiday" class="form-check-input" id="remeber">
            <label class="form-check-label" for="remeber">Holiday</label>
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