@extends('layouts/app')

@section('body')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to</h2>
                    <p>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('asset/main/images/pusda2.png') }}" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person-circle"></i></div>
                            <h4 class="title"><a href="#about" class="stretched-link">About Us</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->
                    <!--
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-newspaper"></i></div>
                            <h4 class="title"><a href="#portfolio" class="stretched-link">Berita</a></h4>
                        </div>
                    </div>
                    -->
                    <!--End Icon Box -->

                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-calendar3"></i></div>
                            <h4 class="title"><a href="#recent-posts" class="stretched-link">Agenda</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-send-fill"></i></div>
                            <h4 class="title"><a href="#contact" class="stretched-link">Kontak</a></h4>
                        </div>
                    </div>
                    <!--End Icon Box -->

                </div>
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
                    <h2>About Us</h2>
                    <p>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur merupakan unsur pelaksana otonomi daerah,
                        dipimpin oleh seorang Kepala Dinas, yang berada di bawah dan bertanggung jawab kepada Gubernur
                        melalui Sekretaris Daerah.</p>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action" style="padding-top: 10px;">
            <div class="container text-center" data-aos="zoom-out">
                {{-- <a href="#" class="glightbox play-btn"></a> --}}
                <h3>MEMAYU HAYUNING TIRTO</h3>
                <p> Usaha Mempertahankan Kelestarian Sumberdaya Air</p>
                {{-- <a class="cta-btn" href="#">Go</a> --}}
            </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Berita</h2>
                    <!--<p>Berita yang ada di PU SDA</p>-->
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                    <div>
                        <ul class="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($jenis_berita as $keys => $values)
                                <li data-filter="{{ '.filter-' . $values->id }}">{{ $values->name }}</li>
                            @endforeach
                        </ul><!-- End Portfolio Filters -->
                    </div>

                    <div class="row gy-4 portfolio-container">

                        @foreach ($jenis_berita as $keys => $values)
                            <?php $values->kode = 'filter-' . $values->id; ?>
                            @foreach ($berita_biasa[$values->id] as $key1 => $value1)
                                <div class="col-xl-4 col-md-6 portfolio-item {{ $values->kode }}">
                                    <div class="portfolio-wrap">
                                        @if ($value1['jenis_dokumentasi'] == '0')
                                            <a href="{{ asset('asset/berita/' . $value1['foto']) }}"
                                                data-gallery="portfolio-gallery-app') }}" class="glightbox"><img
                                                    src="{{ asset('asset/berita/' . $value1['foto']) }}"
                                                    style="height: 250px;margin: auto;display: flex;" class="img-fluid"
                                                    alt=""></a>
                                        @else
                                            <a href="https://www.youtube.com/embed/{{ $value1['foto'] }}"
                                                data-gallery="portfolio-gallery-app') }}" class="glightbox"><img
                                                    src="{{ asset('asset/main/images/play.png') }}" class="img-fluid"
                                                    alt="" style="height: 250px;margin: auto;display: flex;"></a>
                                        @endif
                                        <div class="portfolio-info">
                                            <h4><a href="{{ url('main/detail/' . $value1['id']) }}"
                                                    title="{{ $value1['judul'] }}">{{ substr($value1['judul'], 0, 40) }}...</a>
                                            </h4>
                                            <p>{{ $value1['tanggal'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div><!-- End Portfolio Container -->

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Agenda</h2>
                    <!--<p>Agenda yang ada di PU Sumber Daya Alam</p>-->
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

                </div><!-- End recent posts list -->

            </div>
        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact</h2>
                </div>

                <div class="row gx-lg-0 gy-4">

                    <div class="col-lg-4">

                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
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
                                    <h4>Call:</h4>
                                    <p>(031) 8292234</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Open Hours:</h4>
                                    <p>Senin-Jumat: 08.00 - 16.00</p>
                                </div>
                            </div><!-- End Info Item -->
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2221794811635!2d112.72674251477521!3d-7.328925094710863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb428cf3bcff%3A0xc22462f4ec0e0b2b!2sDinas%20PU%20Sumber%20Daya%20Air%20Provinsi%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1671595015270!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
