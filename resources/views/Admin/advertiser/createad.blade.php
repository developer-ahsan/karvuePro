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
    <script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/fabric.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/html5.js')}}"></script>

    <script type="text/javascript"
            src="https://cdn.rawgit.com/eligrey/FileSaver.js/5733e40e5af936eb3f48554cf6a8a7075d71d18a/FileSaver.js"></script>
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
                    <!-- <div class="form-group">
                        <label for="name-first">Choose Image</label>    
                        <input class="form-control" type='file' onchange="loadPreview(this);" id="image"/>
                        <div class="form-group col-md-6">
                            <img onclick="addtoCanvas()" id="preview_img" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150"/>
                        </div>
                    </div>  --> 
                    <h4>Add Image
                                    <form hidden id="form1" runat="server">
                                        <input hidden type='file' id="imgInp"/>
                                    </form>
                                    <button id="addimg" class="btn btn-primary"><i style="font-size: 15px;" class="fa fa-plus" aria-hidden="true"></i></button>
                            </h4>

                                <div id="avatarlist" style="max-height: 500px; overflow: scroll;">
                                        <img class="img-polaroid tt" src="">
                                </div>
                </div>
                <div class="col-md-9">
                    <!-- <div id="shirtDiv" style="text-align: center;" class="page"
                     style="width: 100%; height: 100%; position: relative; background-color: rgb(255, 255, 255);">
                        <img style="width: 750px" id="tshirtFacing" src="{{asset('img/suv-side.png')}}"></img>

                        <div id="drawingArea"
                         style="position: absolute;top: 53px;left: 64px;z-index: 10;width: 422px;height: 198px;">
                            <canvas id="tcanvas" width="422" height="198" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                        </div>
                    </div> -->
                    <div class="span6">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="pull-right" align="" id="imageeditor" style="display:none">
                            <div class="btn-group">
                                <button class="btn" id="bring-to-front" title="Bring to Front"><i
                                            class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                <button class="btn" id="send-to-back" title="Send to Back"><i
                                            class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i
                                            class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i
                                            class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    EDITOR      -->
                <div id="shirtDiv" class="page"
                     style="width: 100%; height: 100%; position: relative; background-color: rgb(255, 255, 255);">
                    <!--img id="tshirtFacing" src="img/crew_front.png"></img-->
                    <img id="tshirtFacing" style="max-width: 750px !important; width: 750px" src="{{asset('img/suv-side.png')}}"></img>

                    <div id="drawingArea"
                         style="position: absolute;top: 47px;left: 55px;z-index: 10;width: 404px;height: 209px;">
                        <canvas id="tcanvas" width="404" height="209" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>
        <div id="editor"></div>
                

            </div>
                </div>
            </div>
        </div>
    </div>





    <section id="typography" hidden="true">
        <div class="page-header">
            <h1>Adjust the banner</h1>
        </div>

        <!-- Headings & Paragraph Copy -->
        <div class="row">
            <div class="span3">

                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Truck Parameters</a></li>
                        <li><a href="#tab2" data-toggle="tab">Banners</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="well">
                                <p style="font-family: 'Telex',sans-serif;font-weight: bold;line-height: 1;color: #317eac;text-rendering: optimizelegibility;">
                                    Truck Style</p>
                                <select id="shirtstyle" class="form-control">
                                   
                                </select>
                                <!--                              </p>-->
                            </div>
                            <div class="well">
                                <p style="font-family: 'Telex',sans-serif;font-weight: bold;line-height: 1;color: #317eac;text-rendering: optimizelegibility;">
                                    Action</p>
                                <button id="imgsavejpg" class="btn btn-primary" title="Зберегти як зображення"><i
                                            style="font-size: 25px;"
                                            class="fa fa-camera"
                                            aria-hidden="true"></i></button>
                                <button id="imgsavepdf" class="btn btn-primary" title="Зберегти як PDF"><i
                                            style="font-size: 25px;"
                                            class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i></button>
                                <button id="rotate" title="Повернути" class="btn btn-primary"><i
                                            style="font-size: 25px;"
                                            class="fa fa-repeat"
                                            aria-hidden="true"></i></button>
                                <button class="btn btn-primary" onclick="location.reload();" title="Видалити все"><i
                                            style="font-size: 25px;"
                                            class="fa fa-trash"
                                            aria-hidden="true"></i></button>

                            </div>


                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="well">
                                <h4>Text</h4>
                                <div class="input-append">
                                    <input class="span2" id="text-string" type="text"
                                           placeholder="Add text here ...">
                                    <button id="add-text" class="btn" title="Додати"><i class="icon-share-alt"></i>
                                    </button>
                                    <hr>
                                </div>
                                      <h4>Add Image
                                    <form hidden id="form1" runat="server">
                                        <input hidden type='file' id="imgInp"/>
                                    </form>
                                    <button id="addimg" class="btn btn-primary"><i style="font-size: 15px;" class="fa fa-plus" aria-hidden="true"></i></button>
                            </h4>

                                <div id="avatarlist" style="max-height: 500px; overflow: scroll;">
                                        <img class="img-polaroid tt" src="">
                                </div>                                                                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="pull-right" align="" id="imageeditor" style="display:none">
                            <div class="btn-group">
                                <button class="btn" id="bring-to-front" title="Bring to Front"><i
                                            class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                <button class="btn" id="send-to-back" title="Send to Back"><i
                                            class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i
                                            class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i
                                            class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    EDITOR      -->
                <div id="shirtDiv" class="page"
                     style="width: 100%; height: 100%; position: relative; background-color: rgb(255, 255, 255);">
                    <!--img id="tshirtFacing" src="img/crew_front.png"></img-->
                    <img id="tshirtFacing" src="{{asset('img/suv-side.png')}}"></img>

                    <div id="drawingArea"
                         style="position: absolute;top: 47px;left: 72px;z-index: 10;width: 324px;height: 145px;">
                        <canvas id="tcanvas" width="324" height="145" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </section>
        	</div>

	    	</div>
	    	
        </div>
</div>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35639689-1']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    $(document).ready(function () {

        /*******************************************************************************/
        function getContentImage() {
            html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                // document.body.appendChild(canvas)
                $(canvas).get(0).toBlob(function (blob) {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(blob);
                console.log(imageUrl)
                $('#test').append('<img src="' + imageUrl + '"><br>');

            });
        })
            ;
        }

        function LoadeShirts() {
            getContentImage();

            setTimeout(function () {
                rotate();
            }, 500);
            setTimeout(function () {
                getContentImage();
            }, 1200);
        }

        /*******************************************************************************/


        
        $('#imgsavejpg').on('click', function () {
            function save() {
                html2canvas(document.querySelector("#test")).then(canvas => {
                    // document.body.appendChild(canvas)
                    $(canvas).get(0).toBlob(function (blob) {
                    var filesaver = saveAs(blob, "TShirt.png");
                    filesaver.onwriteend = function () {
                        $('#test').empty();
                    }


                });
            })
                ;
            }

            LoadeShirts();
            setTimeout(function () {
                save();
            }, 1700);

        });

        $('#rotate').click(function (e) {
            e.preventDefault();
            rotate();
        });

        function rotate() {
            $('#flip').click();
        }

        $("#addimg").on('click', function () {
            $('#imgInp').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatarlist').append('<img class="img-polaroid tt" src="' + e.target.result + '">');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $('#shirtstyle').on('change', function () {
            $('#tshirtFacing').attr("src", "img/t-shirts/" + $(this).val() + "_front.png");
            IMAGE_NAME = $(this).val();
        });

        $('#imgsavepdf').on('click', function () {
            doc.setFontSize(20);

            setTimeout(function () {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c)
                {
                    var image = new Image();
                    image.src = c.toDataURL("image/jpeg");
                    doc.addImage(image.src, 'JPEG', 30, 5, 145, 145);
                    return image;
                }
                convertCanvasToImage(canvas);

            })
                ;
            }, 100);
            setTimeout(function () {
                rotate();

            }, 700);
            setTimeout(function () {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c)
                {
                    var image = new Image();
                    image.src = c.toDataURL("image/jpeg");
                    doc.addImage(image.src, 'JPEG', 30, 150, 145, 145);
                    return image;
                }
                convertCanvasToImage(canvas);
            })
                ;
            }, 1100);
            setTimeout(function () {
                doc.save("T-Shirt.pdf");

                $('#test').empty();
            }, 1700);

        });

    });

</script>
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
 function showCanvasImage() {
    var vehicle = document.getElementById('vehicle').value; 
    var side = document.getElementById('side').value;
    if(vehicle == 'Truck' && side == 'Front') {
        document.getElementById('rate').value = 'Price is $100'
        document.getElementById('tshirtFacing').src = "{{asset('img/truck-front.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "64px"
        document.getElementById('drawingArea').style.left = "147px"
        document.getElementById('drawingArea').style.width = "221px"
        document.getElementById('drawingArea').style.height = "66px"
        document.getElementById('tcanvas').style.width = "221px"
        document.getElementById('tcanvas').style.height = "66px"
    } else if(vehicle == 'Truck' && side == 'Back') {
        document.getElementById('rate').value = 'Price is $150'
        
        document.getElementById('tshirtFacing').src = "{{asset('img/truck-back.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "106px"
        document.getElementById('drawingArea').style.left = "84px"
        document.getElementById('drawingArea').style.width = "347px"
        document.getElementById('drawingArea').style.height = "398px"
        document.getElementById('tcanvas').style.width = "347px"
        document.getElementById('tcanvas').style.height = "398px"
    } else if(vehicle == 'Truck' && side == 'Side') {
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing').src = "{{asset('img/truck-side.png')}}"
        document.getElementById('tshirtFacing').style.width ="750px"
        document.getElementById('drawingArea').style.top = "70px"
        document.getElementById('drawingArea').style.left = "199px"
        document.getElementById('drawingArea').style.width = "521px"
        document.getElementById('drawingArea').style.height = "185px"
        document.getElementById('tcanvas').style.width = "521px"
        document.getElementById('tcanvas').style.height = "185px"

    } else if(vehicle == 'SUV' && side == 'Front') {
        document.getElementById('rate').value = 'Price is $100'

        document.getElementById('tshirtFacing').src = "{{asset('img/suv-front.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "43px"
        document.getElementById('drawingArea').style.left = "127px"
        document.getElementById('drawingArea').style.width = "271px"
        document.getElementById('drawingArea').style.height = "66px"
        document.getElementById('tcanvas').style.width = "271px"
        document.getElementById('tcanvas').style.height = "66px"
    } else if(vehicle == 'SUV' && side == 'Back') {
        document.getElementById('rate').value = 'Price is $150'

        document.getElementById('tshirtFacing').src = "{{asset('img/suv-back.png')}}"
        document.getElementById('tshirtFacing').style.width ="500px"
        document.getElementById('drawingArea').style.top = "68px"
        document.getElementById('drawingArea').style.left = "108px"
        document.getElementById('drawingArea').style.width = "310px"
        document.getElementById('drawingArea').style.height = "313px"
        document.getElementById('tcanvas').style.width = "310px"
        document.getElementById('tcanvas').style.height = "313px"
    } else if(vehicle == 'SUV' && side == 'Side') {
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing').style.width ="750px"
        document.getElementById('tshirtFacing').src = "{{asset('img/suv-side.png')}}"
        document.getElementById('drawingArea').style.top = "47px"
        document.getElementById('drawingArea').style.left = "55px"
        document.getElementById('drawingArea').style.width = "404px"
        document.getElementById('drawingArea').style.height = "209px"
        document.getElementById('tcanvas').style.width = "404px"
        document.getElementById('tcanvas').style.height = "209px"
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