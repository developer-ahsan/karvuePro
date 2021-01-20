
@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
 
  <!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-primary ">{{$designer->c_name}}</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary ">Company Logo</h6>
					</div>
					<div class="card-body">
						<img src="{{url('../'.$designer->comp_logo)}}" width=60px>
					</div>
				</div>
				
			</div>
			<div class="col-md-9">
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
							<h4>Website:</h4>
						</div>
						<div class="col-md-8">
							<h4>{{$designer->c_name}}</h4>
							<h4>{{$designer->users['email']}}</h4>
							<h4>{{$designer->c_phone}}</h4>
							<a href="{{$designer->comp_url}}">{{$designer->comp_url}}</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary">Design Samples</h6>
					</div>
					<div class="card-body">
						@if($designer->sampledesigner)
						<div class="row">
							@foreach($designer->sampledesigner as $samples)
							<div class="col-md-3 border">
								<a target="_blank" href="{{url('../'.$samples->image)}}">
								<img width="200px" src="{{url('../'.$samples->image)}}">
								</a>
							</div>
							@endforeach
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary">Service Plans</h6>
					</div>
					<div class="card-body">
						<div class="row">
							@if($designer->basic)
							<div class="col-md-4">
								<div class="card shadow mb-4">
									<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
									<h6 class="m-0 font-weight-bold text-primary">Basic Plan</h6>
									</div>
									<div class="card-body">
										<p>{{$designer->basic->detail}}</p>
										<p><b>Revisions:</b> {{$designer->basic->detail}}</p>
										<p><b>Designs:</b> {{$designer->basic->number_of_designs}}</p>
										<p><b>Price:</b> ${{$designer->basic->price}}</p>
									</div>
								</div>
							</div>
							@endif
							@if($designer->standard)
							<div class="col-md-4">
								<div class="card shadow mb-4">
									<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
									<h6 class="m-0 font-weight-bold text-primary">Standard Plan</h6>
									</div>
									<div class="card-body">
										<p>{{$designer->standard->detail}}</p>
										<p><b>Revisions:</b> {{$designer->standard->detail}}</p>
										<p><b>Designs:</b> {{$designer->standard->number_of_designs}}</p>
										<p><b>Price:</b> ${{$designer->standard->price}}</p>
									</div>
								</div>
							</div>
							@endif
							@if($designer->premium)
							<div class="col-md-4">
								<div class="card shadow mb-4">
									<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
									<h6 class="m-0 font-weight-bold text-primary">Premium Plan</h6>
									</div>
									<div class="card-body">
										<p>{{$designer->premium->detail}}</p>
										<p><b>Revisions:</b> {{$designer->premium->detail}}</p>
										<p><b>Designs:</b> {{$designer->premium->number_of_designs}}</p>
										<p><b>Price:</b> ${{$designer->premium->price}}</p>
									</div>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- cardbody -->

</div>

</div>
@endsection