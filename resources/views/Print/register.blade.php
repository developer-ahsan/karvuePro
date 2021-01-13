<style>
  #map {
    height: 400px;
    width: 100%;
  }
  .signin-signups {
    background: url(app-assets/designer/printer-back.jpg) no-repeat bottom right;
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
                                <li class="breadcrumb-item active" aria-current="page">Sign Up | Printing</li>
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
                        <form method="POST" action="{{ url('registerprintingpress') }}" enctype="multipart/form-data" id="regform" class="needs-validation" novalidate>
                         {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>Sign Up - Printing</h4>
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
