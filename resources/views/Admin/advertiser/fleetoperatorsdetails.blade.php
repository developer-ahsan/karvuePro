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

      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }

      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
@extends('Admin.layouts.app')

@section('content')
  <div>
    
    <div id="map"></div>
    <!-- <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div> -->
  </div>
@endsection
<script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
  $( document ).ready(function() {
    console.log( "ready!" );
    var waypointss = {!! json_encode($waypoint->toArray()) !!};
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
          '{{$fleetoperators->locationField}}',
          '{{$fleetoperators->destination}}',
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