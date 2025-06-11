    <style>
        /* CSS for popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: auto;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .popup-content {
            background-color: rgba(0, 0, 0, 0); /* Background color of content */
            /*padding: 20px;*/
            border-radius: 5px;
            text-align: center;
            position: relative;
            /*box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);*/
            width: auto; /* Let the width adjust to content */
            max-width: 90%; /* Optional: Max width for content */
            margin: 0 auto;
        }
        .close-btn {
            position: relative;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
        }
        
                /* CSS for the banner */
        .banner {
            display: flex;
            justify-content: center;
            align-items: center;
            /*background-color: #fff;*/ /* White background for the banner */
            padding: 20px;
            /*box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);*/
            margin-bottom: 20px;
        }
        .banner img {
            width: 100%;
            max-width: 1200px;
            height: auto;
        }

    </style>
    <style type="text/css">
        /* html,
      body {
        height: 100%;
      } */
      .carousel {
        width: relative;
        background-color: #000;
        /* height: relative; */
      }
      .carousel-fade .carousel-inner .item {
        -webkit-transition-property: opacity;
        transition-property: opacity;
      }
      .carousel-fade .carousel-inner .item,
      .carousel-fade .carousel-inner .active.left,
      .carousel-fade .carousel-inner .active.right {
        opacity: 0;
      }
      .carousel-fade .carousel-inner .active,
      .carousel-fade .carousel-inner .next.left,
      .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
      }
      .carousel-fade .carousel-inner .next,
      .carousel-fade .carousel-inner .prev,
      .carousel-fade .carousel-inner .active.left,
      .carousel-fade .carousel-inner .active.right {
        left: 0;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .carousel-fade .carousel-control {
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .carousel-fade .carousel-control .glyphicon {
        font-size: 6rem;
      }
      .carousel,
      .carousel-inner,
      .carousel-inner .item {
        height: 100%;
      }
      .stopfade {
        opacity: 0.5;
      }
      .slide-content {
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100%;
      }
      .slide-content video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: 0;
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        -webkit-transition: 1s opacity;
        transition: 1s opacity;
      }
      .slide-content video::-webkit-media-controls-start-playback-button {
        display: none !important;
        -webkit-appearance: none;
      }
      .door {
        font-family: Revista-Black;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        height: 100%;
        width: 100%;
        z-index: 1;
      }
      .door .title {
        font-size: 14rem;
        text-transform: uppercase;
        /* letter-spacing: 0.3rem; */
        line-height: 13rem;
        text-align: center;
        justify-content: center;
        align-items: center;
      }
      .door .description {
        border-top: 1px solid #fff;
        margin-top: 15px;
        font-size: 4rem;
      }
      @media screen and (max-width: 640px) {
          .door .description {
            font-size: 2rem;
        }
        .door .title {
            font-size: 4rem;
            text-transform: uppercase;
            /* letter-spacing: 0.3rem; */
            line-height: 5rem;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .carousel-fade .carousel-control .glyphicon {
            font-size: 3rem;
        }

      }
    </style>
@extends('layouts/app')

@section('body')

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
      <li data-target="#carousel" data-slide-to="3"></li>
  </ol>
  
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="slide-content">
        <video poster="" webkit-playsinline id="bgvid" autoplay loop>
          <source src="{{ asset('asset/aplikasi/a128nadp_v.mp4') }}" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <img src="{{ asset('asset/main/images/logo_white.png') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100" style="max-width:300px;">
          <div class="py-2"></div>
          <div class='title'>Selamat Datang</div>
          <!-- <div class="description">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</div> -->
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="" webkit-playsinline id="bgvid" autoplay loop>
          <source src="{{ asset('asset/aplikasi/djifly192090329_v.mp4') }}" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <div class='title'>Selamat Datang</div>
          <div class="description">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="" webkit-playsinline id="bgvid" autoplay loop>
          <source src="{{ url('https://www.youtube.com/embed/S2AXBgaHAKI?si=6Ucfxh1m3MRUiD7Q')}} ">
        </video>
        <div class="slide-overlay door">
            <div class='title'>Selamat Datang</div>
            <div class="description">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="" webkit-playsinline id="bgvid" autoplay loop>
          <source src="url('https://www.youtube.com/embed/2z3-6ZNb3Ic?si=gI3CdVrGwslplE6n')}}" type="video/mp4">
        </video>
        <div class="slide-overlay door">
            <div class='title'>Selamat Datang</div>
            <div class="description">Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</div>
        </div>
      </div>
    </div>
  </div>
  
  <a class="carousel-control left" href="#carousel" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  
  <a class="carousel-control right" href="#carousel" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  
</div>

<script type="text/javascript">
// If not iPhone, play first video and setup event handlers for  carousel rotations
// iPhone will not play videos inline, and will take control of the browser
if(!/iPhone/i.test(navigator.userAgent)) {
   
    $('.active > div > video').get(0).play();

    $('#carousel').bind('slide.bs.carousel', function(e) {
      $(e.relatedTarget).find('video').get(0).play();
    });

    $('#carousel').bind('slid.bs.carousel', function(e) {
      $('video').not('.active > div > video').each(function() {
        $(this).get(0).pause();
      });
    });
  }
</script>
<script>
    const video = document.getElementById("bgvid");
    const navbar = document.getElementById("navbar");

    function playVideoWithSound() {
        video.volume = 0.05;
        video.muted = false;
        video.play().then(() => {
            // console.log("Video is playing with sound!");
        }).catch(error => {
            // console.log("Autoplay with sound blocked:", error);
            video.muted = true;
            video.play();
        });

        // Remove event listeners after interaction
        document.removeEventListener("mousemove", playVideoWithSound);
        // document.removeEventListener("scroll", playVideoWithSound);
        document.removeEventListener("click", playVideoWithSound);
        document.removeEventListener("keydown", playVideoWithSound);
    }

    function fakeUserInteraction() {
        // console.log("Simulating user interaction...");

        // 1️⃣ Simulate Click on Body
        setTimeout(() => {
            const fakeClick = new MouseEvent("click", { bubbles: true, cancelable: true });
            document.body.dispatchEvent(fakeClick);
            // console.log("Fake click triggered.");
        }, 500);

        // 2️⃣ Simulate Hover Over Navbar
        setTimeout(() => {
            const hoverEvent = new MouseEvent("mouseenter", { bubbles: true, cancelable: true });
            navbar.dispatchEvent(hoverEvent);
            // console.log("Fake hover triggered.");
        }, 700);

        // 3️⃣ Auto Scroll Down and Up
        // setTimeout(() => {
        //     window.scrollTo(0, 500);
        //     setTimeout(() => {
        //         window.scrollTo(0, 0);
        //         console.log("Auto-scroll triggered.");
        //     }, 500);
        // }, 1000);

        // 4️⃣ Simulate Key Press
        setTimeout(() => {
            const keyEvent = new KeyboardEvent("keydown", { key: "Enter", bubbles: true });
            document.dispatchEvent(keyEvent);
            // console.log("Fake key press triggered.");
        }, 1200);

        // 5️⃣ Final Attempt to Unmute and Play Video
        setTimeout(() => {
            playVideoWithSound();
        }, 1500);
    }

    // Add Event Listeners for User Interactions
    document.addEventListener("mousemove", playVideoWithSound);
    // document.addEventListener("scroll", playVideoWithSound);
    document.addEventListener("click", playVideoWithSound);
    document.addEventListener("keydown", playVideoWithSound);

    // Trigger Fake User Interaction
    setTimeout(fakeUserInteraction, 2000);
</script>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <!-- <h2>Selamat Datang</h2> -->
                    <!-- <p>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur.</p> -->
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <!-- <img src="{{ asset('asset/main/images/pusda2.png') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"> -->
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5 justify-content-center text-center">

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-pencil-square"></i></div>
                            <h4 class="title"><a href="bidang" class="stretched-link" target="blank_">Sekretariat</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->
                    
                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gear-fill"></i></div>
                            <h4 class="title"><a href="psda" class="stretched-link" target="blank_">PSDA</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-water"></i></div>
                            <h4 class="title"><a href="swp" class="stretched-link" target="blank_">SWP</a></h4>
                        </div>
                    </div>
                    
                    <!--End Icon Box -->

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-droplet-half"></i></div>
                            <h4 class="title"><a href="irigasi" class="stretched-link" target="blank_">Irigasi</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person-lines-fill"></i></div>
                            <h4 class="title"><a href="binfat" class="stretched-link" target="blank_">Bina Manfaat</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                </div>
                <!-- <div class="row gy-4 mt-5 justify-content-center text-center">

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person-circle"></i></div>
                            <h4 class="title"><a href="#about" class="stretched-link">Tentang Kami</a></h4>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-newspaper"></i></div>
                            <h4 class="title"><a href="#portfolio" class="stretched-link">Berita</a></h4>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-calendar3"></i></div>
                            <h4 class="title"><a href="#recent-posts" class="stretched-link">Agenda</a></h4>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-send-fill"></i></div>
                            <h4 class="title"><a href="#contact" class="stretched-link">Kontak</a></h4>
                        </div>
                    </div>

                </div> -->
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about" style="padding-bottom: 10px;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Tentang Kami</h2>
                    <p>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur merupakan unsur pelaksana otonomi daerah,
                        dipimpin oleh seorang Kepala Dinas, yang berada di bawah dan bertanggung jawab kepada Gubernur
                        melalui Sekretaris Daerah.</p>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action" style="padding-top: 10px;">
            <div class="container text-center" data-aos="zoom-out">
                {{-- <a href="#" class="glightbox play-btn"></a> --}}
                <h3>MEMAYU HAYUNING TIRTO</h3>
                <p> Usaha Mempertahankan Kelestarian Sumberdaya Air</p>
                {{-- <a class="cta-btn" href="#">Go</a> --}}
            </div>
        </section>
        <!-- End Call To Action Section -->
        
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about" style="padding-bottom: 10px;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Peta Pos Kewenangan Dinas PU SDA</h2>
                    <iframe src="https://hidrologi.dpuair.jatimprov.go.id/mapview2" width="100%" height="80%" style="border:none;"></iframe>
                </div>
                <div class="section-header">
                    <h2>Flood Forecasting Weather System</h2>
                    <iframe src="https://sih3.dpuair.jatimprov.go.id/ffwsview" style="border:none;" width="100%" height="80%"></iframe>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Portfolio Section ======= -->
        
        <!--<section id="headline" class="about" style="padding-bottom: 10px;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Headline</h2>
                </div>

            </div>
        </section>-->

        <!--<section id="call-to-action" class="call-to-action" style="padding-top: 10px;">
            <div class="container text-center" data-aos="zoom-out">
                <div class="banner">
                    <a href="https://linktr.ee/dewansdajatim" target="_blank">
                        <img src="{{ asset('asset/berita/headlinepengumuman2.png') }}" alt="Banner">
                    </a>
                </div>
            </div>
        </section>-->
        <!-- End Call To Action Section -->
            
        
        <section id="portfolio" class="portfolio sections-bg">

        <!-- <div class="container">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/pusdajatim" data-instgrm-version="12">
                <div class="instagram-wrapper">
                    <a id="main_link" href="https://www.instagram.com/pusdajatim/" target="_blank">
                        <div class="profile-header">
                            <div class="profile-pic"></div>
                            <div class="profile-info">
                                <div class="profile-name"></div>
                                <div class="profile-username"></div>
                            </div>
                        </div>
                        <div class="post-placeholder"></div>
                        <div class="instagram-icon">
                            <svg width="50px" height="50px" viewBox="0 0 60 60" xmlns="https://www.w3.org/2000/svg">
                                <g fill="black">
                                    <path d="M556.869,30.41C554.814,30.41 553.148,32.076 553.148,34.131C553.148,36.186 554.814,37.852 556.869,37.852C558.924,37.852 560.59,36.186 560.59,34.131C560.59,32.076 558.924,30.41 556.869,30.41M541,60.657C535.114,60.657 530.342,55.887 530.342,50C530.342,44.114 535.114,39.342 541,39.342C546.887,39.342 551.658,44.114 551.658,50C551.658,55.887 546.887,60.657 541,60.657M541,33.886C532.1,33.886 524.886,41.1 524.886,50C524.886,58.899 532.1,66.113 541,66.113C549.9,66.113 557.115,58.899 557.115,50C557.115,41.1 549.9,33.886 541,33.886"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="view-post">View this post on Instagram</div>
                    </a>
                    <p class="shared-post">
                        <a href="https://www.instagram.com/pusdajatim/" target="_blank">Shared post</a> on 
                        <time>Time</time>
                    </p>
                </div>
            </blockquote>
            <script async src="https://www.instagram.com/embed.js"></script>
            <style>
                .instagram-media {
                    background: #FFF;
                    border: 0;
                    border-radius: 3px;
                    box-shadow: 0 0 1px rgba(0,0,0,0.5), 0 1px 10px rgba(0,0,0,0.15);
                    margin: 1px;
                    max-width: 540px;
                    min-width: 326px;
                    padding: 0;
                    width: 99.375%;
                }

                .instagram-wrapper {
                    padding: 16px;
                    text-align: center;
                }

                #main_link {
                    display: block;
                    text-decoration: none;
                    width: 100%;
                }

                .profile-header {
                    display: flex;
                    align-items: center;
                }

                .profile-pic {
                    background-color: #F4F4F4;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    margin-right: 14px;
                }

                .profile-info {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .profile-name,
                .profile-username {
                    background-color: #F4F4F4;
                    border-radius: 4px;
                    height: 14px;
                }

                .profile-name {
                    width: 100px;
                    margin-bottom: 6px;
                }

                .profile-username {
                    width: 60px;
                }

                .post-placeholder {
                    padding: 19% 0;
                }

                .instagram-icon {
                    display: block;
                    height: 50px;
                    width: 50px;
                    margin: 0 auto 12px;
                }

                .view-post {
                    color: #3897f0;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    font-weight: 550;
                    line-height: 18px;
                    padding-top: 8px;
                }

                .shared-post {
                    color: #c9c8cd;
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                    line-height: 17px;
                    margin: 8px 0;
                    text-align: center;
                }

                .shared-post a {
                    color: #c9c8cd;
                    text-decoration: none;
                }
            </style>
        </div> -->



            
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita</h2>
                    <!--<p>Berita yang ada di PU SDA</p>-->
                </div>

                <!-- Elfsight Instagram Feed | Dinas PU SDA -->
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-0dcc7314-3588-40d6-9e8d-de07f47bee70" data-elfsight-app-lazy></div>

                <div class="py-3"></div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <ul class="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($jenis_berita as $keys => $values)
                                <li data-filter="{{ '.filter-' . $values->id }}">{{ $values->name }}</li>
                            @endforeach
                        </ul><!-- End Portfolio Filters -->
                    </div>

                    <div class="row gy-4 portfolio-container">
                        
                        @foreach($berita_biasa as $keys => $values)
                            <?php $cek = 'filter-' . $values['jenis_berita_id'];?>
                            
                            <div class="col-xl-4 col-md-6 portfolio-item {{ $cek }}">
                                <div class="portfolio-wrap">
                                    @if ($values['jenis_dokumentasi'] == '0')
                                        <a href="{{ asset('asset/berita/' . $values['foto']) }}"
                                            data-gallery="portfolio-gallery-app') }}" class="glightbox"><img
                                                src="{{ asset('asset/berita/' . $values['foto']) }}"
                                                style="height: 250px;margin: auto;display: flex;" class="img-fluid"
                                                alt=""></a>
                                    @else
                                        <a href="https://www.youtube.com/embed/{{ $values['foto'] }}"
                                            data-gallery="portfolio-gallery-app') }}" class="glightbox"><img
                                                src="{{ asset('asset/main/images/play.png') }}" class="img-fluid"
                                                alt="" style="height: 250px;margin: auto;display: flex;"></a>
                                    @endif
                                    <div class="portfolio-info">
                                        <h4>
                                            <a href="{{ url('main/detail/' . $values['id']) }}" title="{{ $values['judul'] }}">{{ substr($values['judul'], 0, 40) }}...</a>
                                        </h4>
                                        <p>{{ $values['tanggal'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- End Portfolio Container -->

                </div>

            </div>
            <!--<div id="popup" class="popup">
                <div class="popup-content">
                
                
                
                    <a href="https://linktr.ee/dewansdajatim" target="_blank">
                    <img src="{{ asset('asset/berita/popupwindowpengumuman3.png') }}" alt="poster-pendaftaran" style="width: 40%;">
                        
                    </a>
                    <div class="px-1"></div>
                    <span class="close-btn" onclick="closePopup()" style="text-color:white;">[X] Close</span>
                    
                                                
                </div>
            </div>
    <script>
        // JavaScript for popup
        document.addEventListener('DOMContentLoaded', (event) => {
            showPopup();
        });

        function showPopup() {
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>-->
            
        </section><!-- End Portfolio Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Agenda</h2>
                    
                </div>

                <div class="row gy-4">

                    @foreach ($data_agenda as $agenda)
                        <div class="col-xl-4 col-md-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('asset/main/images/agenda.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                                <p class="post-category">{{ $agenda['tanggal'] }}</p>
                                <h2 class="title">
                                    <a href="{{ url('main/agenda') }}"
                                        title="{{ $agenda['judul'] }}">{{ substr($agenda['judul'], 0, 40) }}...</a>
                                </h2>

                            </article>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Kontak</h2>
                </div>

                <div class="row gx-lg-0 gy-4">

                    <div class="col-lg-4">

                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    <p>Jl. Gayung Kebonsari No.169, Ketintang,</p>
                                </div>
                            </div><!-- End Info Item -->

                            {{-- <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>pusdajawatimur@gmail.com</p>
                                </div>
                            </div><!-- End Info Item --> --}}

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telepon:</h4>
                                    <p>(031) 8292234</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Jam Kerja:</h4>
                                    <p>Senin-Jumat: 08.00 - 16.00</p>
                                </div>
                            </div><!-- End Info Item -->
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2221794811635!2d112.72674251477521!3d-7.328925094710863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb428cf3bcff%3A0xc22462f4ec0e0b2b!2sDinas%20PU%20Sumber%20Daya%20Air%20Provinsi%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1671595015270!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-refer
                            rer-when-downgrade"></iframe>
                    </div>


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
