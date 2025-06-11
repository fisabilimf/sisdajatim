<!DOCTYPE html>
<html>

<head>
    <title>Dinas Pekerjaan Umum Sumber Daya Air</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/li-scroller.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/main_new/css/style.css') }}">
    <!--[if lt IE 9]>
<script src="{{ asset('asset/main_new/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('asset/main_new/js/respond.min.js') }}"></script>
<![endif]-->
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">
                        <div class="col-md-6">
                            <div class="header_top_left">
                                <p>{{ $d_hari }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header_top_right">
                                <ul class="top_nav">
                                    <li><a href="{{ url('mainmenu') }}">Home</a></li>
                                    <li><a href="{{ url('main/profil') }}">Profil</a></li>
                                    <li><a href="{{ url('main/agenda') }}">Agenda</a></li>
                                    <li><a href="{{ url('main/prasarana/0') }}">Find Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="margin: 0 auto;">
                                <div class="logo_area"><a href="index.html" class="logo"><img
                                            src="{{ asset('asset/main_new/images/pusda.png') }}" alt="Logo"
                                            class="img_logo"></a></div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="navArea">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav main_nav">
                        @foreach ($menu as $men)
                            @if ($men->tipe == 0)
                                @if ($men->urutan == 1)
                                    <li class="active">
                                        <a href="{{ url($men->link_data) }}">
                                            <span class="fa fa-home desktop-home"></span>
                                            <span class="mobile-show">{{ $men->name }}</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url($men->link_data) }}">{{ $men->name }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-expanded="false">{{ $men->name }}</a>
                                    <ul class="dropdown-menu" role="menu">
                                        @if (isset($sub[$men->id]))
                                            @foreach ($sub[$men->id] as $subs)
                                                <li>
                                                    <a href="{{ url($subs->link_data) }}">{{ $subs->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </nav>
        </section>
        <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea"> <span>PU SDA</span>
                        <ul id="ticker01" class="news_sticker">
                            {{-- <li><a href="#">-> My First News Item</a></li>
                            <li><a href="#">-> My Second News Item</a></li> --}}
                        </ul>
                        <div class="social_area">
                            <ul class="social_nav">
                                <li class="twitter"><a href="#"></a></li>
                                <li class="googleplus"><a href="#"></a></li>
                                <li class="youtube"><a href="#"></a></li>
                                <li class="mail"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">

                @yield('body')

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">

                @include('layouts.sideright')

            </aside>
        </div>


        <footer id="footer">
            <div class="footer_top">
                <div class="row">

                </div>
            </div>
            <div class="footer_bottom">
                <p class="copyright">Copyright &copy; 2022 <a href="{{ url('/') }}">Dinas Pekerjaan Umum Sumber
                        Daya Air Provinsi Jawa Timur</a></p>
                {{-- <p class="developer">Developed By Wpfreeware</p> --}}
            </div>
        </footer>
    </div>
    <script src="{{ asset('asset/main_new/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/wow.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/slick.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/jquery.li-scroller.1.0.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/jquery.newsTicker.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('asset/main_new/js/custom.js') }}"></script>
</body>

</html>
