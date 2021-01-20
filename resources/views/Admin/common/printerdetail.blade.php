@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
 
  <!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-primary ">{{$printers->c_name}}</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-7">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary ">Company Details</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
							<h4>Name:</h4>
							<h4>Email:</h4>
							<h4>Phone:</h4>
							<h4>Address:</h4>
						</div>
						<div class="col-md-8">
							<h4>{{$printers->c_name}}</h4>
							<h4>{{$printers->email}}</h4>
							<h4>{{$printers->c_phone}}</h4>
							<h4>{{$printers->administrative_area_level_1}}</h4>
						</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-5">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary ">Bussines Hours</h6>
					</div>
					<div class="card-body">
						@if($printers->businessHrs)
						<div class="row">
							@foreach($printers->businessHrs as $bussiness)
							<div class="col-md-6">
								<p>{{$bussiness->week_day}}</p>
							</div>
							<div class="col-md-6">
								<p>{{$bussiness->start_time}}-{{$bussiness->end_time}}</p>
							</div>
							@endforeach
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- cardbody -->

</div>

</div>
@endsection