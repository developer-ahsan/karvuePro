<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
@extends('layouts.app')

@section('content')

<!-- Field to type in autocompleted address -->
<div class="form-group col-md-6" id="locationField" style="margin-top: 300px">
  <label for="locationField">Enter Your Address</label>
  <input id="autocomplete"
         placeholder="Address"
         onFocus="geolocate()"
         type="text"
         name="locationField"
         class="form-control"
         value="{{ old('locationField') }}"
         required>
</div>

<!-- //Hidden fields where the lattitude and longitude is saved -->
<input type="hidden" name="address_latitude" id="address_latitude" value="0" />
<input type="hidden" name="address_longitude" id="address_longitude" value="0" />

<!-- //Fields that get autocompleted -->
<div class="form-row" id="address">
  <div class="form-group col-md-2">
    <label class="label text-sm">Street Number</label>
    <input type="text"  class="field form-control" id="street_number" name="street_number" disabled="true"> 
  </div>
  <div class="form-group col-md-4">
     <label class="label text-sm">Street Name</label>
     <input type="text"  class="field form-control" id="route" name="route" disabled="true" placeholder="123 Main Street" >       
  </div>
  <div class="form-group col-md-6">
      <label class="label text-sm">City</label>
      <input type="text" class="field form-control" id="locality" disabled="true" name="locality" placeholder="City" >
  </div>    
  <div class="form-group col-md-6 col-sm-12">
      <label class="label text-sm">Province</label>
      <input type="text" class="field form-control" id="administrative_area_level_1" disabled="true" name="administrative_area_level_1" placeholder="Province" >
  </div>
  <div class="form-group col-md-6">
      <label class="label text-sm">Zip code</label>
      <input type="text" class="field form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Zip" >
  </div>
</div>

<!-- //Displays the map -->
<div class="form-row">
    <div id="map" style="width:100%;height:400px;"></div>
 </div>
 
@endsection