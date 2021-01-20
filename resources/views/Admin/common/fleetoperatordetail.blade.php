<style type="text/css">
      #right-panel {
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select,
      #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }

      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map {
        height: 100%;
        float: left;
        width: 100%;
        height: 100%;
      }

    </style>
@extends('Admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
 
  <!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
		<h6 class="m-0 font-weight-bold text-primary ">{{$fleetoperator->c_name}}</h6>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary ">Company Logo</h6>
					</div>
					<div class="card-body">
						<img src="{{url('../'.$fleetoperator->image)}}" width=60px>
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
						</div>
						<div class="col-md-8">
							<h4>{{$fleetoperator->c_name}}</h4>
							<h4>{{$fleetoperator->users['email']}}</h4>
							<h4>{{$fleetoperator->c_phone}}</h4>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary">Bussiess Hours</h6>
					</div>
					<div class="card-body">
						<div class="row">
							@foreach($fleetoperator->businessHrs as $bussiness)
							<div class="col-md-6">
								<p>{{$bussiness->week_day}}</p>
							</div>
							<div class="col-md-6">
								<p>{{$bussiness->start_time}}-{{$bussiness->end_time}}</p>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
					<h6 class="m-0 font-weight-bold text-primary">Vehicles</h6>
					</div>
					<div class="card-body">
						<div class="row">
							@foreach($fleetoperator->vehicle as $vehicle)
							<div class="col-md-6">
								<p>{{$vehicle->type}}</p>
							</div>
							<div class="col-md-6">
								<p>{{$vehicle->count}}</p>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-primary">Service Area</h6>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- cardbody -->

</div>
				    <div id="map"></div>

</div>
@endsection
<script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
  $( document ).ready(function() {
    console.log( "ready!" );
    var waypointss = {!! json_encode($fleetoperator->waypoint->toArray()) !!};
    console.log(waypointss);
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: { lat: 50.8549217, lng: -130.2094884 },
        });
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({
          draggable: false,
          map,
          panel: document.getElementById("right-panel"),
        });
        directionsRenderer.addListener("directions_changed", () => {
          computeTotalDistance(directionsRenderer.getDirections());
        });
        displayRoute(
          '{{$fleetoperator->locationField}}',
          '{{$fleetoperator->destination}}',
          directionsService,
          directionsRenderer
        );
      }

      function displayRoute(origin, destination, service, display) {
        service.route(
          {
            origin: origin,
            destination: destination,
            waypoints: waypointss,
            travelMode: google.maps.TravelMode.DRIVING,
            avoidTolls: true,
          },
          (result, status) => {
            if (status === "OK") {
              display.setDirections(result);
            } else {
              alert("Could not display directions due to: " + status);
            }
          }
        );
      }

      function computeTotalDistance(result) {
        let total = 0;
        const myroute = result.routes[0];

        for (let i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById("total").innerHTML = total + " km";
      }

      

      initMap();
});
      
    </script>