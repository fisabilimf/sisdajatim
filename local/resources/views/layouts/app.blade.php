<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dinas Pekerjaan Umum Sumber Daya Air - Jawa Timur</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('asset/main/images/gres.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/main_new/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/main_new/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/main_new/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('asset/main_new/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/main_new/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('asset/main_new/css/main.css') }}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Script -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NFS3E13453"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-NFS3E13453');
    </script>

</head>

<body>

    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-clock d-flex align-items-center ms-4"><span>{{ $d_hari }}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                @foreach ($sosmed as $sos)
                    <a href="{{ $sos->link }}"><img height="25px"
                            width="25px"src="{{ asset('asset/sosial/' . $sos->icon) }}"></a>
                @endforeach
            </div>
        </div>
    </section><!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">

        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            
            <nav id="navbar" class="navbar">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('asset/main/images/logo_new.png') }}" alt="" >
                <!-- <h1>Impact<span>.</span></h1> -->
            </a>
                <ul>
                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <!--<li><a href="{{ url('main/profil') }}">PROFIL</a></li>-->
                    <li class="dropdown"><a href="{{ url('main/profil') }}"><span>PROFIL</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ url('main/profil') }}">Profil</a></li>
                            <li><a href="{{ url('main/visi-misi') }}">Visi Misi</a></li>
                            <li><a href="{{ url('main/tugas-pokok-fungsi') }}">Tugas Pokok dan Fungsi</a></li>
                            <li><a href="{{ url('main/struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ url('main/dasar-hukum') }}">Dasar Hukum</a></li>
                            <li><a href="{{ url('main/tujuan-sasaran') }}">Tujuan dan Sasaran</a></li>
                            <li><a href="{{ url('main/strategi-kebijakan') }}">Strategi dan Kebijakan</a></li>
                            <li><a href="{{ url('main/daftar-upt') }}">Daftar UPT</a></li>
                        </ul>
                    </li>
                    <!--<li class="dropdown"><a href="{{ url('main/program') }}"><span>PROGRAM</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ url('main/rencana-strategis') }}">Rencana Strategis</a></li>
                            <li><a href="{{ url('main/rencana-kerja') }}">Rencana Kerja</a></li>
                            <li><a href="{{ url('main/indeks-kinerja-utama') }}">Indeks Kinerja Utama</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="{{ url('main/laporan') }}"><span>LAPORAN</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="{{ url('main/perjanjian-kerja') }}">Perjanjian Kerja</a></li>
                            <li><a href="{{ url('main/laporan-kerja') }}">Laporan Kerja</a></li>
                        </ul>
                    </li>-->
                    <!--<li class="dropdown"><a href="{{ url('main/portal-data') }}"><span>PORTAL DATA</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li li class="dropdown"><a href="{{ url('main/sisda') }}"><span>SISDA JATIM</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="{{ url('main/hidrologi') }}">Hidrologi</a>
                                    <li><a href="{{ url('main/sih3') }}">SIH3</a>
                                    <li><a href="{{ url('main/siswa') }}">SISWA</a>
                                    <li><a href="{{ url('main/siprabu') }}">SIPRABHU</a>
                                    <li><a href="{{ url('main/sibb') }}">SIBB</a>
                                    <li><a href="{{ url('main/esurat') }}">E-Surat</a>
                                    <li><a href="{{ url('main/esppd') }}">E-SPPD</a>
                                </ul>
                            </li>
                            <li li class="dropdown"><a href="{{ url('main/sda') }}"><span>Sumber Daya Air</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="{{ url('main/bendung') }}"><span>Bendung</span></a></li>
                                    <li><a href="{{ url('main/waduk') }}"><span>Waduk</span></a></li>
                                    <li><a href="{{ url('main/mata-air') }}"><span>Mata Air</span></a></li>
                                    <li li class="dropdown"><a href="{{ url('main/rekomtek') }}"><span>REKOMTEK</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                        <ul>
                                            <li><a href="{{ url('main/rekomtek-sop') }}">SOP</a>
                                            <li><a href="{{ url('main/persyaratan-perizinan') }}">Persyaratan Perizinan</a>
                                            <li><a href="{{ url('main/perizinan-berusaha') }}">Perizinan Berusaha</a>
                                            <li><a href="{{ url('main/pks') }}">PKS</a>
                                        </ul>
                                    </li>
                                    <li li class="dropdown"><a href="{{ url('main/irigasi') }}"><span>Irigasi</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                        <ul>
                                            <li><a href="{{ url('main/peta-irigasi') }}">Peta Irigasi Tiap UPT</a>
                                            <li><a href="{{ url('main/skema-irigasi') }}">Skema Irigasi</a>
                                            <li><a href="{{ url('main/iksi') }}">IKSI</a>
                                            <li><a href="{{ url('main/epaksi') }}">EPAKSI</a>
                                            <li><a href="{{ url('main/data-rawan-banjir') }}">Data Daerah Irigasi Kewenangan Provinsi</a>
                                        </ul>
                                    </li>
                                    <li li class="dropdown"><a href="{{ url('main/sungai') }}"><span>Sungai</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                        <ul>
                                            <li><a href="{{ url('main/data-das') }}">Data DAS</a>
                                            <li><a href="{{ url('main/skema-irigasi') }}">Laporan Inventarisasi Banjir</a>
                                            <li><a href="{{ url('main/peta-rawan-banjir') }}">Peta Rawan Banjir</a>
                                        </ul>
                                    </li>
                                    <li li class="dropdown"><a href="{{ url('main/hidrologi') }}"><span>Hidrologi</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                        <ul>
                                            <li><a href="{{ url('main/data-debit') }}">Debit</a>
                                            <li><a href="{{ url('main/data-curah-hujan') }}">Curah Hujan</a>
                                            <li><a href="{{ url('main/data-klimatologi') }}">Klimatologi</a>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    @foreach ($menu as $men)
                        @if ($men->tipe == 0)
                            @if ($men->name == "HOME")
                                <!-- <li><a href="{{ url($men->link_data) }}">{{ $men->name }}</a></li> -->
                            @else
                                <li><a href="{{ url($men->link_data) }}">{{ $men->name }}</a></li>
                            @endif
                        @else
                            @if ($men->name == "DOKUMEN")
                                <li class="dropdown"><a href="#"><span>{{ $men->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        @if (isset($sub[$men->id]))
                                            @foreach ($sub[$men->id] as $subs)
                                                <li><a href="{{ url($subs->link_data) }}">{{ $subs->name }}</a></li>
                                            @endforeach
                                        @endif
                                        <li class="dropdown"><a href="{{ url('main/program') }}"><span>PROGRAM</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/rencana-strategis') }}">Rencana Strategis</a></li>
                                                <li><a href="{{ url('main/rencana-kerja') }}">Rencana Kerja</a></li>
                                                <li><a href="{{ url('main/indeks-kinerja-utama') }}">Indeks Kinerja Utama</a></li>
                                            </ul>
                                        </li>                                        
                                        <li class="dropdown"><a href="{{ url('main/laporan') }}"><span>LAPORAN</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/perjanjian-kerja') }}">Perjanjian Kerja</a></li>
                                                <li><a href="{{ url('main/laporan-kerja') }}">Laporan Kerja</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @elseif ($men->name == "PORTAL DATA")
                                <li class="dropdown"><a href="#"><span>{{ $men->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        @if (isset($sub[$men->id]))
                                            @foreach ($sub[$men->id] as $subs)
                                                <li><a href="{{ url($subs->link_data) }}">{{ $subs->name }}</a></li>
                                            @endforeach
                                        @endif
                                <li li class="dropdown"><a href="{{ url('main/sisda') }}"><span>SISDA JATIM</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="{{ url('main/hidrologi') }}">Hidrologi</a>
                                        <li><a href="{{ url('main/sih3') }}">SIH3</a>
                                        <li><a href="{{ url('main/siswa') }}">SISWA</a>
                                        <li><a href="{{ url('main/siprabu') }}">SIPRABHU</a>
                                        <li><a href="{{ url('main/sibb') }}">SIBB</a>
                                        <li><a href="{{ url('main/esurat') }}">E-Surat</a>
                                        <li><a href="{{ url('main/esppd') }}">E-SPPD</a>
                                    </ul>
                                </li>
                                <li li class="dropdown"><a href="{{ url('main/sda') }}"><span>Sumber Daya Air</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="{{ url('main/bendung') }}"><span>Bendung</span></a></li>
                                        <li><a href="{{ url('main/waduk') }}"><span>Waduk</span></a></li>
                                        <li><a href="{{ url('main/mata-air') }}"><span>Mata Air</span></a></li>
                                        <li li class="dropdown"><a href="{{ url('main/rekomtek') }}"><span>REKOMTEK</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/rekomtek-sop') }}">SOP</a>
                                                <li><a href="{{ url('main/persyaratan-perizinan') }}">Persyaratan Perizinan</a>
                                                <li><a href="{{ url('main/perizinan-berusaha') }}">Perizinan Berusaha</a>
                                                <li><a href="{{ url('main/pks') }}">PKS</a>
                                            </ul>
                                        </li>
                                        <li li class="dropdown"><a href="{{ url('main/irigasi') }}"><span>Irigasi</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/peta-irigasi') }}">Peta Irigasi Tiap UPT</a>
                                                <li><a href="{{ url('main/skema-irigasi') }}">Skema Irigasi</a>
                                                <li><a href="{{ url('main/iksi') }}">IKSI</a>
                                                <li><a href="{{ url('main/epaksi') }}">EPAKSI</a>
                                                <li><a href="{{ url('main/data-rawan-banjir') }}">Data Daerah Irigasi Kewenangan Provinsi</a>
                                            </ul>
                                        </li>
                                        <li li class="dropdown"><a href="{{ url('main/sungai') }}"><span>Sungai</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/data-das') }}">Data DAS</a>
                                                <li><a href="{{ url('main/skema-irigasi') }}">Laporan Inventarisasi Banjir</a>
                                                <li><a href="{{ url('main/peta-rawan-banjir') }}">Peta Rawan Banjir</a>
                                            </ul>
                                        </li>
                                        <li li class="dropdown"><a href="{{ url('main/hidrologi') }}"><span>Hidrologi</span> <i class="bi bi-chevron-right dropdown-indicator"></i></a>
                                            <ul>
                                                <li><a href="{{ url('main/data-debit') }}">Debit</a>
                                                <li><a href="{{ url('main/data-curah-hujan') }}">Curah Hujan</a>
                                                <li><a href="{{ url('main/data-klimatologi') }}">Klimatologi</a>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                    </ul>
                                </li>
                            @else
                            <li class="dropdown"><a href="#"><span>{{ $men->name }}</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    @if (isset($sub[$men->id]))
                                        @foreach ($sub[$men->id] as $subs)
                                            <li><a href="{{ url($subs->link_data) }}">{{ $subs->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            @endif
                        @endif
                    @endforeach
                    
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    @yield('body')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 footer-info">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                        <img src="{{ asset('asset/main/images/logo_new.png') }}" alt="">
                    </a>
                    <!--<p>Cras fermentum odio eu feugiat lide par naso tierra.</p>-->
                    <div class="social-links d-flex mt-4">
                        @foreach ($sosmed as $sos)
                            <a target="_blank" href="{{ $sos->link }}"><img height="25px"
                                    width="25px"src="{{ asset('asset/sosial/' . $sos->icon) }}"></a>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-5 footer-links">
                    <h4>Lokasi</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2221794811635!2d112.72674251477521!3d-7.328925094710863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb428cf3bcff%3A0xc22462f4ec0e0b2b!2sDinas%20PU%20Sumber%20Daya%20Air%20Provinsi%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1671595015270!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Jl. Gayung Kebonsari No.169,<br>
                        Ketintang, Kec. Gayungan<br>
                        Kota SBY, Jawa Timur<br>
                        60235<br><br>
                        <strong>Phone:</strong> (031) 8292234<br>
                        <!-- <strong>Email:</strong> pusdajawatimur@gmail.com<br> -->
                    </p>

                </div>

            </div>
        </div>
        <div class="py-5"></div>
        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span>2022</span></strong>. All Rights Reserved
            </div>
            <!-- <div class="credits">
                Designed by <a href="https://dpuair.jatimprov.go.id/">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa
                    Timur</a>
            </div> -->
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!--<div id="preloader"></div>-->

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/main/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/main_new/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset/main_new/js/main.js') }}"></script>

    <script>
        $(".search-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            var search_column = $(this).attr('xcolumn');
            // console.log(search_column);
            $("#table-custom tr").filter(function() {
                // console.log('td.'+search_column);
                // console.log($(this).find('td.'+search_column));
                $(this).toggle($(this).find('td').eq(search_column).text().toLowerCase().indexOf(value) > -
                    1)
            });
        });
        @foreach ($subjenis as $sj)
            $(".search-input-{{ $sj->id }}").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var search_column = $(this).attr('xcolumn');
                // console.log(search_column);
                $("#table-custom-{{ $sj->id }} tr").filter(function() {
                    // console.log('td.'+search_column);
                    // console.log($(this).find('td.'+search_column));
                    $(this).toggle($(this).find('td').eq(search_column).text().toLowerCase().indexOf(
                        value) > -1)
                });
            });
        @endforeach
    </script>
    
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NFS3E13453"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-NFS3E13453');
    </script>
    
    
    <!-- Google tag (gtag.js) -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-272553318-1"></script>-->
    <!--<script>-->
    <!--  window.dataLayer = window.dataLayer || [];-->
    <!--  function gtag(){dataLayer.push(arguments);}-->
    <!--  gtag('js', new Date());-->
    
    <!--  gtag('config', 'UA-272553318-1');-->
    <!--</script>-->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-21C3JKQJ2V"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-21C3JKQJ2V');
</script>



</body>

</html>
