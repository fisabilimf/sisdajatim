
<html>
<head>
<title>Dinas Pekerjaan Umum Sumber Daya Air</title>
<link rel="icon" type="image/ico" href='{{asset("asset/main/images/gres.png")}}'/>
<link href="{{asset("asset/main/css/bootstrap.css")}}" rel="stylesheet">
<!-- Custom Theme files -->
<link href="{{asset("asset/main/css/style.css")}}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

<link rel="stylesheet" href="{{asset("asset/main/css/font-awesome.min.css")}}" />
  <link rel="stylesheet" href="{{asset("asset/admin/fancybox/dist/jquery.fancybox.css")}}">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!---pop-up-box----> 





</head>
<body  >

<style>
.navbar1 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;

}

/* The dropdown container */
.dropdown1 {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown1 .dropbtn1 {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
  text-decoration: none;
  font-weight: 400;
  font-family: 'bebasregular';
}

/* Add a red background color to navbar links on hover */
.navbar1 a:hover, .dropdown1:hover .dropbtn1 {
  background-color: red;
  color:#fff;
}

/* Dropdown content (hidden by default) */
.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  color:#fff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1000;
}

/* Links inside the dropdown */
.dropdown-content1 a {
  float: none;

  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content1 a:hover {
  background-color: #ddd;

}

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown-content1 {
  display: block;
}
</style>
    <!-- header-section-starts -->
    <div class="container"> 
        <div class="news-paper">
            <div class="header">
                <div class="header-left">
                    <div class="logo">
                        <a href="{{url("/")}}">
                             <div class="col-sm-12">
                            <div class="col-sm-10" style="padding:0;text-align:right">
                            <img src="{{asset("asset/main/images/pusda.png")}}" style="width:250px" >
                        </div>
                      
                        </div>
                        </a>
                    </div>
                </div>
              
                    <div class="social-icons">
                      
                        @foreach($sosmed as $sos)
                        <li><a target="_blank" href="{{$sos->link}}"><img height="25px" width="25px"src="{{asset('asset/sosial/'.$sos->icon)}}"></a></li>
                        @endforeach
                         <li style="width:180">
                            <div class="search" style="width:100%;padding:0 0 0 5px">
						<form style="line-height:1.1" method="post" action="{{url('main/search_store')}}" >
							<input type="text" style="width:100%" name="cari"/>
							<input type="submit">
						</form>
						</div>
						</li>
					
                     
                        
                    </div>
                    
                <div class="clearfix"></div>
                <div class="header-right">
                    <div class="top-menu">
                        <ul>        
                            <li><a href="{{url("mainmenu")}}">Home</a></li> |  
                            <li><a href="{{url("main/profil")}}">Profil</a></li> |  
                            <li><a href="{{url("main/agenda")}}">Agenda</a></li> |   
                            <li><a href="{{url("main/prasarana/0")}}">Find Us</a></li>  | 
                            <li><a href="{{url("main/galleri")}}">Gallery</a></li>  | 
                            <li><a href="{{url("main/link")}}">Aplikasi</a></li> |   
                            <li><a href="{{url("main/timeline")}}">Timeline</a></li>  |                           
                        </ul>
                    </div>
                     
                    
                    

                  
                    
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                </div>
            <span class="menu"></span>
            <div class="menu-strip navbar1  " style="padding:0;">
               <ul>

                @foreach($menu as $men)
                  @if($men->tipe == 0)
                     <li style="margin-top:6px"><a href="{{url($men->link_data)}}">{{$men->name}}</a></li>
                  @else
                    <li style="margin-top:6px">
                      <div class="dropdown1">
                                  <button class="dropbtn1">{{$men->name}} &nbsp;
                                    <i class="fa fa-caret-down"></i>
                                  </button>
                                   <div class="dropdown-content1">
                          @if(isset($sub[$men->id]))
                           @foreach($sub[$men->id] as $subs)
                             <a href="{{url($subs->link_data)}}" style="color:black">{{$subs->name}}</a>
                          @endforeach 
                          @endif
                          </div>    
                          </div> 
                    </li> 
                  @endif
                @endforeach

            </ul>
            </div>
        
            <!-- script for menu -->
            <div class="clearfix"></div>
            <div class="main-content"> 
                 <div class="col-md-9 total-news">
                         @yield('body')
                 </div>  
                <div class="col-md-3 side-bar">
                        @include('layouts.sideright')
                </div>  
                <div class="clearfix"></div>
           </div>
            <div class="footer text-center">
                <div class="bottom-menu">
                    <ul> |                
                        @foreach($data_berita as $dd)
                        <li><a href="{{url("main/berita_detail/".$dd->id)}}">{{$dd->name}}</a></li> |
                    @endforeach           
                    @foreach($data_dokumen as $dd)
                        <li><a href="{{url("main/dokumen/".$dd->id)}}">{{$dd->name}}</a></li> |
                    @endforeach                         
                    </ul>
                </div>
                <div class="copyright text-center">
                    <p>Website &copy; 2019 | Develop by  <a href="http://dinotechsolution.co.id">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</a></p>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset("asset/main/js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("asset/main/js/jquery.leanModal.min.js")}}"></script>
<script src="{{asset("asset/main/js/responsiveslides.min.js")}}"></script>
        <script src="{{asset("asset/admin/fancybox/dist/jquery.fancybox.js")}}"></script>
        <script>
 $('.fancybox').fancybox();
</script>
        <!-- script for menu -->
                <script>
                 
                $( "span.menu" ).click(function() {
                  $( ".menu-strip" ).slideToggle( "slow", function() {
                    // Animation complete.
                  });
                });
            </script>
                        <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                              $("#conference-slider").responsiveSlides({
                                auto: true,
                                manualControls: '#slider3-pager',
                              });
                            });
                        </script>
                        <script>
$(".search-input").on("keyup", function() 
	{
		var value = $(this).val().toLowerCase();
		var search_column = $(this).attr('xcolumn');
		// console.log(search_column);
		$("#table-custom tr").filter(function() 
		{
			// console.log('td.'+search_column);
			// console.log($(this).find('td.'+search_column));
			$(this).toggle($(this).find('td').eq(search_column).text().toLowerCase().indexOf(value) > -1)
		});
	});
	@foreach($subjenis as $sj)
	$(".search-input-{{$sj->id}}").on("keyup", function() 
	{
		var value = $(this).val().toLowerCase();
		var search_column = $(this).attr('xcolumn');
		// console.log(search_column);
		$("#table-custom-{{$sj->id}} tr").filter(function() 
		{
			// console.log('td.'+search_column);
			// console.log($(this).find('td.'+search_column));
			$(this).toggle($(this).find('td').eq(search_column).text().toLowerCase().indexOf(value) > -1)
		});
	});
	@endforeach
</script>

 <script>
      
         $("#tipe_data").change(event => {
             console.log(event.target.value);
             if(event.target.value == '0'){
                 $('#file_input').show();
             }else{
                 $('#file_input').hide();
             }
        });
      </script>
</body>
</html>