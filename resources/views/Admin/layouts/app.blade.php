
<style type="text/css">
  .chat-btn {
    position: absolute;
    right: 14px;
    bottom: 30px;
    cursor: pointer
}

.chat-btn .close {
    display: none
}

.chat-btn i {
    transition: all 0.9s ease
}

#check:checked~.chat-btn i {
    display: block;
    pointer-events: auto;
    transform: rotate(180deg)
}

#check:checked~.chat-btn .comment {
    display: none
}

.chat-btn i {
    font-size: 22px;
    color: #fff !important
}

.chat-btn {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    background-color: blue;
    color: #fff;
    font-size: 22px;
    border: none
}

.wrapper {
    position: absolute;
    right: 20px;
    bottom: 100px;
    width: 300px;
    background-color: #fff;
    border-radius: 5px;
    opacity: 0;
    transition: all 0.4s
}

#check:checked~.wrapper {
    opacity: 1
}

.header {
    padding: 13px;
    background-color: blue;
    border-radius: 5px 5px 0px 0px;
    margin-bottom: 10px;
    color: #fff
}

.chat-form {
    padding: 15px
}

.chat-form input,
textarea,
button {
    margin-bottom: 10px
}

.chat-form textarea {
    resize: none
}

.form-control:focus,
.btn:focus {
    box-shadow: none
}

.btn,
.btn:focus,
.btn:hover {
    background-color: blue;
    border: blue
}

#check {
    display: none !important
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Wevertize</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin-assets/css/admin-css.css')}}" rel="stylesheet">
  <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmdMnJY62bTAjU3Sk3IVGGOIMPSe7OMjQ&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>
        
    @stack('heads')
    @toastr_css

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
      @include('Admin.layouts.includes.sidebar')
      <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @include('Admin.layouts.includes.header')
        @yield('content')
      </div>
      @include('Admin.layouts.includes.footer')
    </div>
    <!-- End of Content Wrapper -->
  </div>
   <!-- End of Page Wrapper -->
   <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{url('/logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Chat -->
  <input type="checkbox" id="check"> <label class="chat-btn" for="check"> <i class="fas fa-fw  fa-comments comment"></i> <i class="fa fa-close close"></i> </label>
<div class="wrapper">
    <div class="header">
        <h6>Let's Chat - Online</h6>
    </div>
    <div class="text-center p-2"> <span>Please fill out the form to start chat!</span> </div>
    <div class="chat-form"> <input type="text" class="form-control" placeholder="Name"> <input type="text" class="form-control" placeholder="Email"> <textarea class="form-control" placeholder="Your Text Message"></textarea> <button class="btn btn-success btn-block">Submit</button> </div>
</div>
<!-- Bootstrap core JavaScript-->
  <script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin-assets/js/sb-admin-2.min.js')}}"></script>


<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmdMnJY62bTAjU3Sk3IVGGOIMPSe7OMjQ&libraries=places&callback=initMap" async defer ></script> -->
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
        @stack('scripts')

</body>
@jquery
@toastr_js
@toastr_render
</html>