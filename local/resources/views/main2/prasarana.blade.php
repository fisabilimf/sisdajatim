@extends('layouts/app_peta')

@section('body')

    

     
        <link href="{{asset("asset/peta/css/app.css")}}" rel="stylesheet">


        <!-- Header -->

      


        <div >
            <div id="mapView">
                <div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span> Loading map...</div>
            </div>
            <div id="content">
                <div class="filter">
                  
               
                
                    <form class="filterForm" style="padding-top:20px">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 formItem">
                                <div class="formField">
                                    <label>Letak Kantor Sumber Daya Air Jawa Timur</label>
                                   
                                   </div>
                            </div>
                        </div>
                       
                       
                    </form>
                </div>
                <div class="resultsList">
                    <div class="row">
                        <?php $datamap = array(); $i=0;?>
                        @foreach($data as $data)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="#{{$data->id}}" class="card fancybox">
                                <div class="figure">
                                    <img src="{{asset("asset/sarana/".$data->foto)}}" alt="image" height="140">
                                  
                                    <div class="figView"><span class="icon-eye"></span></div>
                                    @if($data->lingkup_id == 5)
                                    <?php $mark = "../../../asset/main/images/marker-green.png";
                                    $ling = "Umum/Swasta"; ?>
                                    <div class="figType" style="background:green">{{$data->lingkup_data->name}}</div>
                                    @else
                                    <?php $mark = "../../../asset/main/images/marker-red.png";
                                    $ling = "Pemerintah"; ?>
                                    <div class="figType" style="background:red">{{$data->lingkup_data->name}}</div>
                                    @endif
                                    
                                </div>
                                <h2>{{$data->name}}</h2>
                                <div class="cardAddress"><span class="icon-pointer"></span>{{$data->alamat}}</div>
                               
                              
                                <div class="clearfix"></div>
                            </a>
                        </div>
                          <div id="{{$data->id}}" style="width:700px;display: none;">
                                                    <h3><strong style="color:#000">{{$data->name}}</strong></h3><br>
                                                     <?php echo $data->deskripsi ?>
                                                     <br><br>
                                                   Alamat = {{$data->alamat}}
                                                    <br><br>
                                                   Contact Person = {{$data->pemilik}}
                                              </div>
                        <?php 

                                $datamap[$i]["judul"] = $data->name;
                                $datamap[$i]["lingkup"] = $data->lingkup_data->name;
                                $datamap[$i]["alamat"] = $data->alamat;
                                $datamap[$i]["lat"] = $data->lat;
                                $datamap[$i]["long"] = $data->long;
                                $datamap[$i]["mark"] = $mark;
                                $datamap[$i]["ling"] = $data->lingkup_data->name;
                                $datamap[$i]["pemilik"] = $data->pemilik;
                                $datamap[$i]["foto"] = $data->foto;
                                $i++;
                                ?>
                        @endforeach
                     
                        
                        
                    </div>
                  
                </div>
            </div>
            <div class="clearfix"></div>
        </div>


  
        <script src="{{asset("asset/peta/js/jquery.slimscroll.min.js")}}"></script>
          <script src="http://maps.googleapis.com/maps/api/js?file=api&v=2.x&key=AIzaSyCbs4Havzpa8UZF8EXL90DgjascIEM1ZAU" type="text/javascript"></script>
         <script src="{{asset("asset/peta/js/infobox.js")}}"></script>


        <script src="{{asset("asset/peta/js/app.js")}}" type="text/javascript"></script>
    
             <script>
   $('.fancybox').fancybox();
    $('.fanlapor').fancybox({
'width'       : '90%',
        'height'      : '100%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'});

     $('.fanphoto').fancybox({
'width'       : '60%',
        'height'      : '100%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'});
   
   
</script>
        <script>
        
    // Custom options for map
    var options = {
            zoom : 14,
      
            disableDefaultUI: false,
            mapTypeControlOptions : {
                mapTypeIds : [ 'Dispora' ]
            }
        };
    var styles = [{
        stylers : [ {
            hue : "#cccccc"
        }, {
            saturation : -100
        }]
    }, {
        featureType : "road",
        elementType : "geometry",
        stylers : [ {
            lightness : 100
        }, {
            visibility : "simplified"
        }]
    }, {
        featureType : "road",
        elementType : "labels",
        stylers : [ {
            visibility : "on"
        }]
    }, {
        featureType: "poi",
        stylers: [ {
            visibility: "on"
        }]
    }];

    var newMarker = null;
    var markers = [];

    // json for properties markers on map
    var props = [
 <?php for ($ii=0; $ii < $i; $ii++) { ?>
   
    {
        title : '{{$datamap[$ii]["judul"]}}',
        image : '{{$datamap[$ii]["foto"]}}',
        type : '{{$datamap[$ii]["ling"]}}',
        price : '$1,550,000',
        address : '{{$datamap[$ii]["alamat"]}}',
        bedrooms : '{{$datamap[$ii]["pemilik"]}}',
        bathrooms : '2',
        area : '3430 Sq Ft',
        position : {
            lat : <?php echo($datamap[$ii]["lat"]); ?>,
            lng : <?php echo($datamap[$ii]["long"]); ?>
        },
        markerIcon : '{{$datamap[$ii]["mark"]}}'
    },
     <?php
    
    } 
        ?>
    ];

    // custom infowindow object
    var infobox = new InfoBox({
        disableAutoPan: false,
        maxWidth: 202,
        pixelOffset: new google.maps.Size(-101, -285),
        zIndex: null,
        boxStyle: {
            background: "url('../../asset/main/images/infobox-bg.png') no-repeat",
            opacity: 1,
            width: "202px",
            height: "245px"
        },
        closeBoxMargin: "28px 26px 0px 0px",
        closeBoxURL: "",
        infoBoxClearance: new google.maps.Size(1, 1),
        pane: "floatPane",
        enableEventPropagation: false
    });

    // function that adds the markers on map
    var addMarkers = function(props, map) {
        $.each(props, function(i,prop) {
            var latlng = new google.maps.LatLng(prop.position.lat,prop.position.lng);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: new google.maps.MarkerImage( 
                    'images/' + prop.markerIcon,
                    null,
                    null,
                    null,
                    new google.maps.Size(36, 36)
                ),
                draggable: false,
                animation: google.maps.Animation.DROP,
            });
            var infoboxContent = '<div class="infoW" style="background:#fff">' +
                                    '<div class="propImg">' +
                                        '<img src="../../asset/sarana/' + prop.image + '">' +
                                        '<div class="propBg">' +
                                           
                                            '<div class="propType">' + prop.type + '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="paWrapper">' +
                                        '<div class="propTitle">' + prop.title + '</div>' +
                                        '<div class="propAddress">' + prop.address + '</div>' +
                                    '</div>' +
                                   '<li style="padding-left:10px"> CP : ' + prop.bedrooms + '</li>' +
                                  
                                    '<div class="clearfix"></div>' +
                                    '<div class="infoButtons">' +
                                        '<a class="btn btn-sm btn-round btn-green closeInfo">Close</a>' +
                                 
                                    '</div>' +
                                 '</div>';

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infobox.setContent(infoboxContent);
                    infobox.open(map, marker);
                }
            })(marker, i));

            $(document).on('click', '.closeInfo', function() {
                infobox.open(null,null);
            });

            markers.push(marker);
        });
    }

        </script>

          @endsection