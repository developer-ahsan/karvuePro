<style type="text/css">
        
        .color-preview {
            border: 1px solid #CCC;
            margin: 2px;
            zoom: 1;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 20px;
            height: 20px;
        }

        .rotate {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
            -ms-transform: rotate(90deg);
        }


        .img-polaroid {
            padding: 0;
            margin: 0;
            border: 2px solid transparent;
            max-height: 92px;
            max-width: 92px;
            min-height: 92px;
            min-width: 92px;

        }

        .img-polaroid:hover {
            cursor: pointer;
            border-color: #00a5f7;
        }

        .tt {
            margin-right: 4px;
        }
    </style>
@extends('Admin.layouts.app')

@section('content')

<div class="container-fluid">
	<div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
          
          <form method="POST" action="{{url('dashboard/findfleetandprinter')}}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" enctype="multipart/form-data" id="regform">
        {{ csrf_field() }}
		            <div class="input-group">
		              <input name="location" type="text" class="form-control bg-light border-1 small autocomplete" placeholder="Service Area" aria-label="Search" aria-describedby="basic-addon2">
		              <div class="input-group-append">
		                <button class="btn btn-primary" type="submit">
		                  <i class="fas fa-search fa-sm"></i>
		                </button>
		              </div>
		            </div>
		          </form>
		          <h6 class="m-0 font-weight-bold text-primary">Create Ad</h6>
        </div>
        <div class="card-body">
        	<div class="row">
	    		<div class="col-md-6">
		        	<div class="card shadow mb-4">
				        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				          <h6 class="m-0 font-weight-bold text-primary">Fleet Operators In your Area</h6>
				        </div>
				        <div class="card-body" style="padding: 5px !important">
				        	<div class="table-responsive">
			                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
			                      <th>Company Name</th>
			                      <th>Phone</th>
			                      <th>Address</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@isset($fleets)
			                    @foreach($fleets as $fleet)
			                    <tr>
			                      
			                      <td><a href="{{url('/dashboard/fleetoperatorsdetail/'.$fleet->id)}}">{{$fleet->c_name}} </a></td>
			                      
			                      <td>{{$fleet->c_phone}}
			                      </td>
			                      <td>{{$fleet->locationField}}
			                      </td>
			                    </tr>
			                    @endforeach
			                    @endisset
			                  </tbody>
			                </table>
				        </div>
				    </div>
					</div>
				</div>
				<div class="col-md-6">
		        	<div class="card shadow mb-4">
				        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				          <h6 class="m-0 font-weight-bold text-primary">Printers In your Area</h6>
				        </div>
				        <div class="card-body" style="padding: 5px !important">
				        	<div class="table-responsive">
			                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
			                      <th>Company Name</th>
			                      <th>Phone</th>
			                      <th>Address</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@isset($printers)
			                    @foreach($printers as $fleet)
			                    <tr>
			                      
			                      <td><a href="{{url('/dashboard/fleetoperatorsdetail/'.$fleet->id)}}">{{$fleet->c_name}} </a></td>
			                      
			                      <td>{{$fleet->c_phone}}
			                      </td>
			                      <td>{{$fleet->locationField}}
			                      </td>
			                    </tr>
			                    @endforeach
			                    @endisset
			                  </tbody>
			                </table>
				        </div>
				        </div>
				    </div>
				</div>
			</div>
	    	<div class="row">
	    		<!-- Ads View -->
        	
        	<div class="col-md-12">
        		<div class="card shadow mb-4">
			        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
			          <h6 class="m-0 font-weight-bold text-primary">Ads View</h6>
                      <input id="rate" name="" readonly="true" value="Price is $200">
			        </div>
			        <div class="card-body">
			        	<div class="row">
			        		<div class="col-md-3">
			        			<div class="form-group">
                                    <label for="name-first">Choose Vehicle</label>
                                    <select onchange="showCanvasImage()" name="vehicle" id="vehicle" class="form-control">
                                    	<option value="SUV">SUV</option>
                                    	<option value="Truck">Truck</option>
                                    	<!-- <option value="Sedan">Sedan</option> -->

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name-first">Choose Side</label>
                                    <select onchange="showCanvasImage()" name="side" id="side" class="form-control">
                                    	<option value="Side">Side</option>
                                        <option value="Front">Front</option>
                                    	<option value="Back">Back</option>
                                    	
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name-first">Choose Image</label>	
                                    <input class="form-control" type='file' onchange="loadPreview(this);" id="image"/>
                                    <div class="form-group col-md-6">
                                    <img onclick="addtoCanvas()" id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
                                </div>
                                </div>  

                                <!-- <h4>Add Image
                                    <form hidden id="form1" runat="server">
                                        <input hidden type='file' id="imgInp"/>
                                    </form>
                                    <button id="addimg" class="btn btn-primary"><i style="font-size: 15px;" class="fa fa-plus" aria-hidden="true"></i></button>
                            </h4>

                                <div id="avatarlist" style="max-height: 500px; overflow: scroll;">
                                        <img class="img-polaroid tt" src="">
                                </div> -->


			        		</div>
                            <div class="col-md-9">
                                <div id="shirtDiv" style="text-align: center;" class="page"
                                 style="width: 100%; height: 100%; position: relative; background-color: rgb(255, 255, 255);">
                                <img style="width: 750px" id="tshirtFacing" src="{{asset('img/suv-side.png')}}"></img>

                                <div id="drawingArea"
                                     style="position: absolute;top: 53px;left: 64px;z-index: 10;width: 422px;height: 198px;">
                                    <canvas id="tcanvas" width="422" height="198" class="hover"
                                            style="-webkit-user-select: none;"></canvas>
                                </div>
                            </div>
                            </div>
			        	</div>
			        </div>
			    </div>
        	</div>

	    	</div>
	    	
        </div>
</div>
@endsection
<script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
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
 function addtoCanvas() {
    alert(document.getElementById("preview_img").src);
 }
 function showCanvasImage() {
    var vehicle = document.getElementById('vehicle').value; 
    var side = document.getElementById('side').value;
    if(vehicle == 'Truck' && side == 'Front') {
        document.getElementById('rate').value = 'Price is $100'
        document.getElementById('tshirtFacing').src = "{{asset('img/truck-front.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "64px"
        document.getElementById('drawingArea').style.left = "280px"
        document.getElementById('drawingArea').style.width = "221px"
        document.getElementById('drawingArea').style.height = "66px"
        document.getElementById('tcanvas').style.width = "221px"
        document.getElementById('tcanvas').style.height = "66px"
    } else if(vehicle == 'Truck' && side == 'Back') {
        document.getElementById('rate').value = 'Price is $150'
        
        document.getElementById('tshirtFacing').src = "{{asset('img/truck-back.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "106px"
        document.getElementById('drawingArea').style.left = "216px"
        document.getElementById('drawingArea').style.width = "347px"
        document.getElementById('drawingArea').style.height = "398px"
        document.getElementById('tcanvas').style.width = "347px"
        document.getElementById('tcanvas').style.height = "398px"
    } else if(vehicle == 'Truck' && side == 'Side') {
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing').src = "{{asset('img/truck-side.png')}}"
        document.getElementById('tshirtFacing').style.width ="750px"
        document.getElementById('drawingArea').style.top = "70px"
        document.getElementById('drawingArea').style.left = "209px"
        document.getElementById('drawingArea').style.width = "521px"
        document.getElementById('drawingArea').style.height = "185px"
        document.getElementById('tcanvas').style.width = "521px"
        document.getElementById('tcanvas').style.height = "185px"

    } else if(vehicle == 'SUV' && side == 'Front') {
        document.getElementById('rate').value = 'Price is $100'

        document.getElementById('tshirtFacing').src = "{{asset('img/suv-front.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "43px"
        document.getElementById('drawingArea').style.left = "260px"
        document.getElementById('drawingArea').style.width = "271px"
        document.getElementById('drawingArea').style.height = "66px"
        document.getElementById('tcanvas').style.width = "271px"
        document.getElementById('tcanvas').style.height = "66px"
    } else if(vehicle == 'SUV' && side == 'Back') {
        document.getElementById('rate').value = 'Price is $150'

        document.getElementById('tshirtFacing').src = "{{asset('img/suv-back.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "55px"
        document.getElementById('drawingArea').style.left = "237px"
        document.getElementById('drawingArea').style.width = "310px"
        document.getElementById('drawingArea').style.height = "313px"
        document.getElementById('tcanvas').style.width = "310px"
        document.getElementById('tcanvas').style.height = "313px"
    } else if(vehicle == 'SUV' && side == 'Side') {
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing').style.width ="750px"
        document.getElementById('tshirtFacing').src = "{{asset('img/suv-side.png')}}"
        document.getElementById('drawingArea').style.top = "53px"
        document.getElementById('drawingArea').style.left = "64px"
        document.getElementById('drawingArea').style.width = "422px"
        document.getElementById('drawingArea').style.height = "198px"
        document.getElementById('tcanvas').style.width = "422px"
        document.getElementById('tcanvas').style.height = "198px"
    } else if(vehicle == 'Sedan' && side == 'Front') {
        document.getElementById('rate').value = 'Price is $100'

        document.getElementById('tshirtFacing').src = "{{asset('img/sedan-front.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
    } else if(vehicle == 'Sedan' && side == 'Back') {
        document.getElementById('rate').value = 'Price is $150'

        document.getElementById('tshirtFacing').src = "{{asset('img/sedan-back.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
    } else if(vehicle == 'Sedan' && side == 'Side') {
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing').src = "{{asset('img/sedan-side.png')}}"
        document.getElementById('tshirtFacing').style.width ="750px"
        document.getElementById('drawingArea').style.top = "120px"
        document.getElementById('drawingArea').style.left = "233px"
        document.getElementById('drawingArea').style.width = "332px"
        document.getElementById('drawingArea').style.height = "118px"
        document.getElementById('tcanvas').style.width = "332px"
        document.getElementById('tcanvas').style.height = "118px"

    }
 }
 function addtoCanvas() {
    var c = document.getElementById("tcanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("preview_img");
    ctx.drawImage(img,0,0,c.width, c.height);
 }
</script>
@endpush


<script>
	$( document ).ready(function() {
	function initialize() {

		var acInputs = document.getElementsByClassName("autocomplete");

		for (var i = 0; i < acInputs.length; i++) {

		    var autocomplete = new google.maps.places.Autocomplete(acInputs[i]);
		    autocomplete.inputId = acInputs[i].id;

		    google.maps.event.addListener(autocomplete, 'place_changed', function () {
		    });
		}
	}
	initialize();


    


    });
</script>
