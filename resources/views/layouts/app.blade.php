<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wevertize</title>
    <link href="{{asset('app-assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="{{asset('app-assets/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('app-assets/style.css')}}" rel="stylesheet">
    @toastr_css
</head>


<body>
    <div class="wrap">
        <div id="home-content" class="home-content">
			@include('layouts.includes.header')
			@yield('content')

        </div>
		@include('layouts.includes.footer')
	</div>
        @stack('scripts')
</body>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@jquery
@toastr_js
@toastr_render
<script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="{{asset('app-assets/js/bootstrap.js')}}"></script>
<script src="{{asset('app-assets/js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts.js')}}"></script>
<script>
    $('.grid').masonry({
        // set itemSelector so .grid-sizer is not used in layout
        itemSelector: '.grid-item',
        // use element for option
        columnWidth: '.grid-sizer',
        percentPosition: true
    })
</script>
<script>
//Variables for displaying the address on the map
    // 
</script>
<!-- //Insert your google maps API key where it says YOURKEY -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmdMnJY62bTAjU3Sk3IVGGOIMPSe7OMjQ&libraries=places&callback=initMap" async bdefer ></script>
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
</html>