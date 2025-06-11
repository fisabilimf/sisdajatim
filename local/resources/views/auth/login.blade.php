<!DOCTYPE html>
<head>
   <title>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</title>
            <link rel="icon" type="image/ico" href='{{asset("asset/main/images/gres.png")}}'/>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="templatemo">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="{{asset("asset/login/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("asset/login/css/templatemo_misc.css")}}" rel="stylesheet">
    <link href="{{asset("asset/login/css/templatemo_style.css")}}" rel="stylesheet">

    <script src="{{asset("asset/login/js/jquery-1.11.1.min.js")}}"></script> 
    <script src="{{asset("asset/login/js/jquery.lightbox.js")}}"></script>
    <script src="{{asset("asset/login/js/templatemo_custom.js")}}"></script>

</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="hexagon_container" id="logo">
                <div class="hexagon hexagon2">
                    <div class="hexagon-in1">
                        <div class="hexagon-in2 active">
                            <h2>Sumber</h2>                   
                        </div>
                    </div>
                </div>                  
            </div>
            <div class="hexagon_container" id="team">
                <div class="hexagon hexagon2">
                    <div class="hexagon-in1">
                        <a href="#">
                            <div class="hexagon-in2">
                                <i class="fa fa-cogs"></i>
                                <h2>Daya</h2>                  
                            </div>
                        </a>
                    </div>
                </div>              
            </div>
            <div class="hexagon_container" id="services">
                <div class="hexagon hexagon2">
                    <div class="hexagon-in1">
                        <a href="#">
                            <div class="hexagon-in2">
                                <i class="fa fa-cogs"></i>
                                <h2>Air</h2>                    
                            </div>
                        </a>
                    </div>
                </div>
            </div>      
         
        </div>
           
        <div id="contact-content">
               @if (count($errors) > 0)
                    <div class="alert alert-danger">
                            <strong>Peringatan ! </strong>   Ada yang Salah Dari Data yang Anda Isikan<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                         @endif
                    {!! csrf_field() !!}
            <header>
            <h1>Admin Panel DPU AIR JATIM</h1>
            </header>
            <div class="content1 contact">
                 <form class="masukdata"role="form" method="POST" action="{{url('auth/login')}}">
                       {{ csrf_field() }}
                    <div class="templatemo_form">
                        <input name="email" type="email" class="form-control" placeholder="Email" >
                    </div>
                    <div class="templatemo_form">
                        <input name="password" type="password" class="form-control"  placeholder="Password Anda" >
                    </div>
                    
                    <div class="templatemo_form">
                        <a href="{{url("/")}}" class="buttonmasuk" style="color:#fff">Ke Menu Utama</a>
                        <button type="submit" class="buttondata">Masuk Ke Aplikasi</button>
                     
                      
                    </div>
                </form>   

            

                                              
                    
            </div>
        </div>          
        <div id="gallery-content">
        
                
            <div class="content gallery" id="page1">
                
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/1.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/1.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/2.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/2.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/3.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/3.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content gallery" id="page2" style="display:none;">
                
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/4.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/4.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/5.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/5.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/6.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/6.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content gallery" id="page3" style="display:none;">
                
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/7.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/7.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/8.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/8.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hexagon_container">
                    <div class="hexagon hexagon2 gallery-item">
                        <div class="hexagon-in1">
                            <div class="hexagon-in2" style="background-image:url({{asset("asset/login/images/gallery/9.jpg")}});">
                                <div class="overlay">
                                    <a href="{{asset("asset/login/images/gallery/9.jpg")}}" data-rel="lightbox" class="fa fa-expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination">
                <ul>
                    <li id="page_link_1" class="active">1</li>
                    <li id="page_link_2">2</li>
                    <li id="page_link_3">3</li>
                </ul>
            </div>  
        </div>          
    </div>

      <script>

   

   </script>
<div class="templatemo_footer">
       Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur @ 2019
    </div>
    <script type="text/javascript">
        $('#page_link_1').click({page_no:1},pagination_click);
        $('#page_link_2').click({page_no:2},pagination_click);
        $('#page_link_3').click({page_no:3},pagination_click);
    </script>
      
    <!-- templatemo 408 polystar -->
<!-- 
Polystar Template 
http://www.templatemo.com/preview/templatemo_408_polystar 
-->
</body>
</html>