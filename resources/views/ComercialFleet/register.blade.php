<style>
  #map {
    height: 400px;
    width: 100%;
  }
  .signin-signups {
    background: url(app-assets/designer/signup-back.jpg) no-repeat bottom right;
}
</style>
@extends('layouts.app')

@section('content')

<section id="header-area" class="body-content signin-signups">
    <div class="default-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="breadcrum-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sign Up Commercial Fleet Operators</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="sign-login-form">
                      <div class="panel-body">
                  @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                  @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                  @endif
                </div>
                        <form method="POST" action="{{ url('registerfleet') }}" enctype="multipart/form-data" id="regform" class="needs-validation" novalidate>
                         {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>Sign Up - Commercial Fleet Operators</h4>
                                </div>
                                <div class="form-group col-md-12">
                                    <h5>Personal Information</h5>
                                </div>
                                <input type="text" name="v_counts" hidden="true">
                                <input type="text" name="v_types" hidden="true">
                                <div class="form-group col-md-6">
                                    <label for="name-first">First Name</label>
                                    <input type="text" class="form-control" name="f_name" id="name-first" placeholder="Your First Name" value="{{old('f_name')}}" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name-signup">Last Name</label>
                                    <input type="text" class="form-control" id="name-last" name="l_name" placeholder="Your Last Name" required="true"required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name-signup">Company Name</label>
                                    <input type="text" class="form-control" id="company-info-login" name="c_name" placeholder="Company Info" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name-signup">Company Phone Number</label>
                                    <input type="number" class="form-control" id="company-info-login" name="c_phone" placeholder="Company  Phone Number" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email-login">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email-login"  placeholder="Email" required="true"required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-signup">Password</label>
                                    <input type="password" class="form-control" id="password-signup" name="password" placeholder="Password" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" name="c_password" class="form-control" id="password-confirm" placeholder="Confirm Password" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-bottom: 0px">
                                <div class="form-group col-md-12">
                                    <h5>Vehicle Information</h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vehicle-info">Total Number of Vehicles</label>
                                    <select class="form-control" id="v_count" name="v_count"  onchange="selectNumbers()" required="true">
                                      <option value="0" disabled selected="">Number of Vehicles</option>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5+</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-4" id="v_types" style="display: none;">
                                    <label for="vehicle-type">Vehicle Type</label>
                                    <select name="v_type" class="form-control" id="v_type"  onchange="vtype()" required="true">
                                      <option value="0">Vehicle type</option>
                                      <option>SUV</option>
                                      <option>Truck</option>
                                      <option>Sedan</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-4" id="add_btn" style="display: none;">
                                    <label for="vehicle-type" style="visibility: hidden;">Vehicle Type</label>

                                    <button class="btn btn-primary w-100" onclick="appendToTable()"  type="button">ADD</button>
                                </div>
                            </div>
                            <table name="table" id="table" class="table table-bordered" style="display: none">
                              <thead>
                                <tr>
                                  <th>Number of Vehicles</th>
                                  <th>Vehicle Type</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                              </tbody>
                            </table>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h5>Location Information</h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="area-serve">Location (briefly describe the area you serve)</label>
                                    <input id="autocomplete"
                                           placeholder="Address"
                                           onFocus="geolocate()"
                                           type="text"
                                           name="locationField"
                                           class="form-control"
                                           value="{{ old('locationField') }}"
                                           required>
                                           <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <!-- //Hidden fields where the lattitude and longitude is saved -->
                                <input type="hidden" name="address_latitude" id="address_latitude" value="0" />
                                <input type="hidden" name="address_longitude" id="address_longitude" value="0" />

                                <!-- //Fields that get autocompleted -->
                                <div class="form-row" id="address">
                                  <div class="form-group col-md-2" hidden="true">
                                    <label class="label text-sm">Street Number</label>
                                    <input type="text"  class="field form-control" id="street_number" name="street_number" disabled="true"> 
                                  </div>
                                  <div class="form-group col-md-4" hidden="true">
                                     <label class="label text-sm">Street Name</label>
                                     <input type="text"  class="field form-control" id="route" name="route" disabled="true" placeholder="123 Main Street" >       
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label class="label text-sm">City</label>
                                      <input type="text" class="field form-control" id="locality" disabled="true" name="locality" placeholder="City" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>    
                                  <div class="form-group col-md-6 col-sm-12">
                                      <label class="label text-sm">Province</label>
                                      <input type="text" class="field form-control" id="administrative_area_level_1" disabled="true" name="administrative_area_level_1" placeholder="Province" required="true">
                                      <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                  </div>
                                  <div class="form-group col-md-6" hidden="true">
                                      <label class="label text-sm">Zip code</label>
                                      <input type="text" class="field form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Zip" >
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- <div class="form-group col-md-12">
                                    <h5>Business Hours & Insurance Information</h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service-info">Normal business operation date & time</label>
                                    <input type="date" name="date" class="form-control" id="service-info" required="true"required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service-info">Select Time</label>
                                    <input type="time" name="time" class="form-control" id="service-info" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="service-info">Are you Insured? Please provide answer below</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="check" type="radio" id="inlineCheckbox1" value="Yes" checked="true">
                                        <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="check" type="radio" id="inlineCheckbox2" value="No">
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" required="true">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please Choose File to continue.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="agree" class="form-check-input" id="remeber" required="true">
                                <label class="form-check-label" for="remeber">I agree <a href="#">terms & Condtions</a></label>
                                <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register Your Account</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
    <!-- //Displays the map -->
<div class="form-row" hidden="true">
    <div id="map" style="width:100%;height:400px;"></div>
 </div>
 
</section>

@endsection
@push('scripts')
<script type="text/javascript">
  function selectNumbers() {
    var value = document.getElementById("v_count").value;
    if(value == 0) {
      document.getElementById("v_types").style.display = 'none';
    } else {
      document.getElementById("v_types").style.display= 'grid';
    }
  }
  function vtype() {
    var value = document.getElementById("v_type").value;
    if(value == 0) {
      document.getElementById("add_btn").style.display = 'none';
    } else {
      document.getElementById("add_btn").style.display= 'grid';
    }
  }
  var x = 0;
  var array = Array();
  var types = Array();
  function appendToTable() {
    var value = document.getElementById("v_count").value;
    var value1 = document.getElementById("v_type").value;

   array.push(value); 
   types.push(value1); 
   x++; 
   $('input:hidden[name=v_counts]').val(array); 
   $('input:hidden[name=v_types]').val(types); 

  $('table').append(`
   <tr>
    <td>${value}</td>
    <td>${value1}</td>
   </tr>
   `);
  setTimeout(function() {
    document.getElementById("v_types").style.display = 'none';
    document.getElementById("add_btn").style.display = 'none';
    document.getElementById("table").style.display = 'table';
  }, 100);
}
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endpush
