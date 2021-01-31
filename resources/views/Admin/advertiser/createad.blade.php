<style type="text/css">
    .tscanvas {
        border: 1px solid black;
    }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
@push('heads')
<script type="text/javascript" src="{{ asset('js/fabric.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/tshirtEditor.js')}}"></script>
@endpush @extends('Admin.layouts.app') @section('content')
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
                                        @isset($fleets) @foreach($fleets as $fleet)
                                        <tr>

                                            <td><a href="{{url('/dashboard/fleetoperatorsdetail/'.$fleet->id)}}">{{$fleet->c_name}} </a></td>

                                            <td>{{$fleet->c_phone}}
                                            </td>
                                            <td>{{$fleet->locationField}}
                                            </td>
                                        </tr>
                                        @endforeach @endisset
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
                                        @isset($printers) @foreach($printers as $fleet)
                                        <tr>

                                            <td><a href="{{url('/dashboard/fleetoperatorsdetail/'.$fleet->id)}}">{{$fleet->c_name}} </a></td>

                                            <td>{{$fleet->c_phone}}
                                            </td>
                                            <td>{{$fleet->locationField}}
                                            </td>
                                        </tr>
                                        @endforeach @endisset
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
                            <option value="">Choose</option>
                            <option value="SUV">SUV</option>
                            <option value="Truck">Truck</option>
                            <option value="Trailer">Trailer</option>

                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name-first">Choose Side</label>
                                        <select onchange="showCanvasImage()" name="side" id="side" class="form-control">
                            <option value="">Choose</option>
                            <option value="Side">Side</option>
                            <option value="Front">Front</option>
                            <option value="Back">Back</option>
                            
                        </select>
                                    </div>
                                    <form id="form1">
                                        <input type="file" name="comp_logo" class="form-control" id="comp_logo" required="true" onchange="loadPreview(this);">
                                    </form>

                                    <img id="preview_img" class="img-polaroid" src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png" class="" width="200" height="150" />
                                    <br/>
                                    <button class="btn btn-dark btn-md" onclick="handleRemove()">Clear</button>
                                </div>
                                <div class="col-md-9">
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
                                        <div id="shirtDiv" class="page" style="width: 100%; height: 100%; position: relative; background-color: rgb(255, 255, 255);">
                                            <div id="truck_side">
                                                <img id="tshirtFacing1" style="max-width: 750px !important; width: 750px" src="{{asset('img/suv-side.png')}}"></img>

                                                <div id="drawingArea" style="position: absolute;top: 47px;left: 55px;z-index: 10;width: 404px;height: 209">

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
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35639689-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    $(document).ready(function() {

        /*******************************************************************************/
        function getContentImage() {
            html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                // document.body.appendChild(canvas)
                $(canvas).get(0).toBlob(function(blob) {
                    var urlCreator = window.URL || window.webkitURL;
                    var imageUrl = urlCreator.createObjectURL(blob);
                    console.log(imageUrl)
                    $('#test').append('<img src="' + imageUrl + '"><br>');

                });
            });
        }

        function LoadeShirts() {
            getContentImage();

            setTimeout(function() {
                rotate();
            }, 500);
            setTimeout(function() {
                getContentImage();
            }, 1200);
        }

        /*******************************************************************************/



        $('#imgsavejpg').on('click', function() {
            function save() {
                html2canvas(document.querySelector("#test")).then(canvas => {
                    // document.body.appendChild(canvas)
                    $(canvas).get(0).toBlob(function(blob) {
                        var filesaver = saveAs(blob, "TShirt.png");
                        filesaver.onwriteend = function() {
                            $('#test').empty();
                        }


                    });
                });
            }

            LoadeShirts();
            setTimeout(function() {
                save();
            }, 1700);

        });

        $('#rotate').click(function(e) {
            e.preventDefault();
            rotate();
        });

        function rotate() {
            $('#flip').click();
        }

        $("#addimg").on('click', function() {
            $('#imgInp').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#avatarlist').append('<img class="img-polaroid tt" src="' + e.target.result + '">');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        $('#shirtstyle').on('change', function() {
            $('#tshirtFacing').attr("src", "img/t-shirts/" + $(this).val() + "_front.png");
            IMAGE_NAME = $(this).val();
        });

        $('#imgsavepdf').on('click', function() {
            doc.setFontSize(20);

            setTimeout(function() {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c) {
                        var image = new Image();
                        image.src = c.toDataURL("image/jpeg");
                        doc.addImage(image.src, 'JPEG', 30, 5, 145, 145);
                        return image;
                    }
                    convertCanvasToImage(canvas);

                });
            }, 100);
            setTimeout(function() {
                rotate();

            }, 700);
            setTimeout(function() {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c) {
                        var image = new Image();
                        image.src = c.toDataURL("image/jpeg");
                        doc.addImage(image.src, 'JPEG', 30, 150, 145, 145);
                        return image;
                    }
                    convertCanvasToImage(canvas);
                });
            }, 1100);
            setTimeout(function() {
                doc.save("T-Shirt.pdf");

                $('#test').empty();
            }, 1700);

        });

    });
</script>
@endsection 
@push('scripts')

<script type="text/javascript">
    var canvas;
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
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 333;
        canvasElement.height = 110;

        var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);

        document.getElementById('rate').value = 'Price is $100'
        document.getElementById('tshirtFacing1').src = "{{asset('img/truck-front.png')}}"
        document.getElementById('tshirtFacing1').style.width ="750px"
        document.getElementById('drawingArea').style.top = "56px"
        document.getElementById('drawingArea').style.left = "220px"
        document.getElementById('drawingArea').style.width = "333px"
        document.getElementById('drawingArea').style.height = "110px"
        
        
        initCanvas(333,110, 'ts');
    } else if(vehicle == 'Truck' && side == 'Back') {

        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 347;
        canvasElement.height = 398;
         var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);

        document.getElementById('rate').value = 'Price is $150'
        
        document.getElementById('tshirtFacing1').src = "{{asset('img/truck-back.png')}}"
        document.getElementById('tshirtFacing1').style.width ="500px"
        document.getElementById('drawingArea').style.top = "106px"
        document.getElementById('drawingArea').style.left = "84px"
        document.getElementById('drawingArea').style.width = "347px"
        document.getElementById('drawingArea').style.height = "398px"
        initCanvas(347,398,'ts');
    } else if(vehicle == 'Truck' && side == 'Side') {
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 521;
        canvasElement.height = 185;
         var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing1').src = "{{asset('img/truck-side.png')}}"
        document.getElementById('tshirtFacing1').style.width ="750px"
        document.getElementById('drawingArea').style.top = "70px"
        document.getElementById('drawingArea').style.left = "199px"
        document.getElementById('drawingArea').style.width = "521px"
        document.getElementById('drawingArea').style.height = "185px"
        initCanvas(521,185,'ts');

    } else if(vehicle == 'SUV' && side == 'Front') {
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 368;
        canvasElement.height = 94;
         var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);

        document.getElementById('rate').value = 'Price is $100'

        document.getElementById('tshirtFacing1').src = "{{asset('img/suv-front.png')}}"
        document.getElementById('tshirtFacing1').style.width ="750px"
        document.getElementById('drawingArea').style.top = "71px"
        document.getElementById('drawingArea').style.left = "213px"
        document.getElementById('drawingArea').style.width = "368px"
        document.getElementById('drawingArea').style.height = "94px"
        initCanvas(368,94,'ts');
    } else if(vehicle == 'SUV' && side == 'Back') {
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 416;
        canvasElement.height = 412;
         var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);
        document.getElementById('rate').value = 'Price is $150'

        document.getElementById('tshirtFacing1').src = "{{asset('img/suv-back.png')}}"
        document.getElementById('tshirtFacing1').style.width ="700px"
        document.getElementById('drawingArea').style.top = "88px"
        document.getElementById('drawingArea').style.left = "160px"
        document.getElementById('drawingArea').style.width = "416px"
        document.getElementById('drawingArea').style.height = "412px"
        initCanvas(416,412,'ts');
    } else if(vehicle == 'SUV' && side == 'Side') {
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 404;
        canvasElement.height = 209;
         var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);
        document.getElementById('rate').value = 'Price is $200'

        document.getElementById('tshirtFacing1').style.width ="750px"
        document.getElementById('tshirtFacing1').src = "{{asset('img/suv-side.png')}}"
        document.getElementById('drawingArea').style.top = "47px"
        document.getElementById('drawingArea').style.left = "55px"
        document.getElementById('drawingArea').style.width = "404px"
        document.getElementById('drawingArea').style.height = "209px"
        initCanvas(404,209,'ts');

    } else if(vehicle == 'Trailer' && side=='Side'){
        if(document.getElementsByClassName('canvas-container')[0]) {
            document.getElementsByClassName('canvas-container')[0].remove()
        }
        var canvasElement = document.createElement('canvas');

        canvasElement.id = "ts";
        canvasElement.className = "tscanvas";
        canvasElement.width = 521;
        canvasElement.height = 185;
        var body = document.getElementById("drawingArea");
        body.appendChild(canvasElement);
        document.getElementById('rate').value = 'Price is $500'
        document.getElementById('tshirtFacing1').src = "{{asset('img/trailer.png')}}"
        document.getElementById('tshirtFacing1').style.width ="750px"
        document.getElementById('drawingArea').style.top = "18px"
        document.getElementById('drawingArea').style.left = "55px"
        document.getElementById('drawingArea').style.width = "521px"
        document.getElementById('drawingArea').style.height = "185px"
        initCanvas(650,137,'ts'); 
    }
 }
 function initCanvas(width,height,canva) {
    canvas = new fabric.Canvas(canva, {
        hoverCursor: 'pointer',
        selection: true,
        selectionBorderColor:'red',
    });
    canvas.setHeight(height);
    canvas.setWidth(width);
    canvas.on({
             'object:moving': function(e) {         
                e.target.opacity = 0.5;
              },
              'object:modified': function(e) {          
                e.target.opacity = 1;
              },
             'object:selected':onObjectSelected
     });
    canvas.findTarget = (function(originalFn) {
          return function() {
            var target = originalFn.apply(this, arguments);
            if (target) {
              if (this._hoveredTarget !== target) {
                  canvas.fire('object:over', { target: target });
                if (this._hoveredTarget) {
                    canvas.fire('object:out', { target: this._hoveredTarget });
                }
                this._hoveredTarget = target;
              }
            }
            else if (this._hoveredTarget) {
                canvas.fire('object:out', { target: this._hoveredTarget });
              this._hoveredTarget = null;
            }
            return target;
          };
        })(canvas.findTarget);
    function onObjectSelected(e) {   
        var selectedObject = e.target;
        selectedObject.hasRotatingPoint = true;
      }
    var imageLoader = document.getElementById('comp_logo');
    imageLoader.addEventListener('change', handleImage, false);

    function handleImage(e) {
      var reader = new FileReader();
      reader.onload = function (event) {
        var img = new Image();
        img.onload = function () {
            var imgInstance = new fabric.Image(img, {
                scaleX: 1,
                scaleY: 1
            })
            canvas.add(imgInstance);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    }
     // body...
 }
 function handleRemove() {
    canvas.clear().renderAll(); // Here is your clear canvas function
}
 function addtoCanvas() {
    var imageLoader = document.getElementById('preview_img');
    imageLoader.addEventListener('click', handleImage, false);

    function handleImage(e) {
      var reader = new FileReader();
      reader.onload = function (event) {
        var img = new Image();
        img.onload = function () {
            var imgInstance = new fabric.Image(img, {
                scaleX: 1,
                scaleY: 1
            })
            canvas.add(imgInstance);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
    }
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