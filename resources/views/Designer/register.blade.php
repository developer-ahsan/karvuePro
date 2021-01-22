<style type="text/css">
 
    #preview_img {
      display: none;
    }
    .signin-signups {
    background: url(app-assets/designer/designer-back.jpg) no-repeat bottom right;
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
                                <li class="breadcrumb-item active" aria-current="page">Sign Up Designer</li>
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
                        <form method="POST" action="{{ url('registerdesigner') }}" enctype="multipart/form-data" id="regform"  class="needs-validation" novalidate>
                         {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>Sign Up - Designer</h4>
                                </div>
                                <div class="form-group col-md-12">
                                    <h5>Personal Information</h5>
                                </div>
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
                                <div class="form-group col-md-6">
                                    <label for="comp_logo">Company Logo</label>
                                    <input type="file" name="comp_logo" class="form-control" id="comp_logo" required="true" onchange="loadPreview(this);">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please choose company logo.</div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="comp_url">Company URL</label>
                                    <input type="text" name="c_url" class="form-control" id="comp_url" placeholder="Company URL" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please enter url.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <img id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <!-- <div class="form-group col-md-12">
                                    <h5>Work Samples</h5>
                                </div> -->
                               <div class="form-group col-md-6">
                                <label for="comp_url">Work Samples</label>
                                    <input type="file" name="filenames[]" class="myfrm form-control" multiple  required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please choose images.</div>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comp_url">Designer Media</label>
                                    <select multiple="true" class="form-control">
                                        <option>Print</option>
                                        <option>Web</option>
                                        <option>Video</option>
                                    </select>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please choose images.</div>

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
  function loadPreview(input, id) {
    document.getElementById("preview_img").style.display = 'grid';

    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
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
