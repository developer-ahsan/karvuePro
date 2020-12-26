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
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                        <form method="POST" action="{{ url('') }}" enctype="multipart/form-data" id="regform" class="needs-validation" novalidate>
                         {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>Contact Us - We are here to help you.</h4>
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
                                    <label for="email-login">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email-login"  placeholder="Email" required="true"required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name-signup">Subject</label>
                                    <input type="text" class="form-control" id="company-info-login" name="c_name" placeholder="Subject" required="true">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name-signup">Message</label>
                                    <textarea type="text" class="form-control" id="company-info-login" name="c_phone" placeholder="Company  Phone Number" required="true">
                                    </textarea>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                
                                
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Query</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
 </div>
 
</section>

@endsection
@push('scripts')