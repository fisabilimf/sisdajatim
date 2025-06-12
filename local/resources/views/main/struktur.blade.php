@extends('layouts/app')

@section('body')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <!--<div class="page-header d-flex align-items-center" style="background-image: url('');">-->
            <!--    <div class="container position-relative">-->
            <!--        <div class="row d-flex justify-content-center">-->
            <!--            <div class="col-lg-6 text-center">-->
            <!--                <h2>Profil</h2>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Profil</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero">
            <div class="container position-relative">
                <div class="row gy-5" data-aos="fade-in">
                    <div
                        class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                        <h2>Halaman Profil</h2>
                        <p>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur.</p>

                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="{{ asset('asset/main/images/pusda2.png') }}" class="img-fluid" alt=""
                            data-aos="zoom-out" data-aos-delay="100">
                    </div>
                </div>
            </div>

            <div class="icon-boxes position-relative">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5 justify-content-center text-center">



                        <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-newspaper"></i></div>
                                <h4 class="title"><a href="#selayang" class="stretched-link">Selayang Pandang</a></h4>
                            </div>
                        </div>
                        <!--End Icon Box -->

                        <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-calendar3"></i></div>

                                <h4 class="title"><a href="#visimisitugas" class="stretched-link">Visi, Misi, dan Tugas</a>
                                </h4>
                            </div>
                        </div>
                        <!--End Icon Box -->


                        <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">

                                <div class="icon"><i class="bi bi-person-circle"></i></div>
                                <h4 class="title"><a href="#struktur" class="stretched-link">Struktur Organisasi</a></h4>
                            </div>
                        </div>

                        <!--End Icon Box -->
                        <!--
                                    <div class="col-md-3 col-sm-8" data-aos="fade-up" data-aos-delay="500">
                                        <div class="icon-box">
                                            <div class="icon"><i class="bi bi-send-fill"></i></div>
                                            <h4 class="title"><a href="#contact" class="stretched-link">Kontak</a></h4>
                                        </div>
                                    </div> -->
                        <!--End Icon Box -->

                        <!-- ======= Call To Action Section ======= -->
                        <!-- <section id="call-to-action" class="call-to-action" style="padding-top: 10px;">
                                        <div class="container text-center" data-aos="zoom-out">
                                            {{-- <a href="#" class="glightbox play-btn"></a> --}}
                                            <h3>MEMAYU HAYUNING TIRTO</h3>
                                            <p> Usaha Mempertahankan Kelestarian Sumberdaya Air</p>
                                            {{-- <a class="cta-btn" href="#">Go</a> --}}
                                        </div>
                                    </section> -->
                        <!-- End Call To Action Section -->

                    </div>
                </div>
            </div>


        </section>
        <!-- End Hero Section -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">

                    <div class="home-wrapper">
                        <div class="home-content">
                            <h2 class="osLight"><b></b></h2>
                            <div class="row pb40">
                                <!-- <div class="offer">
                                               <h2>Selayang Pandang</h2>
                                               <div class="clearfix"></div>
                                               <div style="margin-left:15px"><?php echo $profil->selayang; ?></div>
                                            </div>
                                            <div class="offer">
                                               <h2>Visi, Misi & Tugas</h2>
                                               <div class="clearfix"></div>
                                               <div style="margin-left:15px"><?php echo $profil->visi; ?></div>
                                            </div>
                                            <div class="offer">
                                               <h2>Struktur Organisasi Dinas PU Sumber Daya Air Provinsi Jawa Timur</h2>
                                               <div class="clearfix"></div>
                                               <p style="margin-left:15px"> <img src="{{ asset('asset/dokumen/' . $struktur->foto) }}" alt="image" width="100%"></p>
                                            </div> -->

                                <!-- ======= About Us Section ======= -->
                                <section id="selayang" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <h2>Selayang Pandang</h2>
                                            <div style="text-align:justify;"><?php echo $profil->selayang; ?></div>
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                                <!-- ======= About Us Section ======= -->
                                <section id="visimisitugas" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <h2>Visi, Misi, dan Tugas Kami</h2>
                                            <div style="text-align:justify;"><?php echo $profil->visi; ?></div>
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                                <!-- ======= About Us Section ======= -->
                                <section id="visimisitugas" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <h2>Tujuan dan Sasaran</h2>
                                            <!-- <div style="text-align:justify;"><?php echo $profil->visi; ?></div> -->
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                                <!-- ======= About Us Section ======= -->
                                <section id="visimisitugas" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <h2>Dasar Hukum</h2>
                                            <div style="text-align:justify;">
                                                <ol type="1">
                                                    <li>Undang-Undang Nomor 2 Tahun 1950 tentang Pembentukan
                                                        Provinsi Djawa Timur (Himpunan Peraturan-Peraturan Negara
                                                        Tahun 1950) sebagaimana telah diubah dengan Undang-Undang
                                                        Nomor 18 Tahun 1950 tentang Perubahan dalam Undang-
                                                        Undang Nomor 2 Tahun 1950 (Himpunan Peraturan-Peraturan
                                                        Negara Tahun 1950);</li>
                                                    <li>Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan
                                                        Daerah (Lembaran Negara Republik Indonesia Tahun 2014
                                                        Nomor 244, Tambahan Lembaran Negara Republik Indonesia
                                                        Nomor 5587) sebagaimana telah diubah beberapa kali, terakhir
                                                        dengan Undang-Undang Nomor 9 Tahun 2015 tentang
                                                        Perubahan Kedua Atas Undang- Undang Nomor 23 Tahun 2014
                                                        tentang Pemerintahan Daerah (Lembaran Negara Republik
                                                        Indonesia Tahun 2015 Nomor 58, Tambahan Lembaran Negara
                                                        Republik Indonesia Nomor 5679);</li>
                                                    <li>Undang-Undang Nomor 5 Tahun 2004 tentang Aparatur Sipil
                                                        Negara (Lembaran Negara Republik Indonesia Tahun 2014
                                                        Nomor 6, Tambahan Lembaran Negara Republik Indonesia
                                                        Nomor 5494);</li>
                                                    <li>Undang-Undang No.17 Tahun 2019 Tentang Sumber Daya Air;</li>
                                                    <li>Undang-Undang No.11 Tahun 2020 Tentag Cipta Kerja;</li>
                                                    <li>Peraturan Pemerintah Republik Indonesia Nomor 20 Tahun 2006
                                                        tentang Irigasi;</li>
                                                    <li>Peraturan Pemerintah Republik Indonesia Nomor 38 Tahun 2011
                                                        tentang Sungai;</li>
                                                    <li>Peraturan Pemerintah Nomor 30 Tahun 2024 tentang
                                                        Pengelolaan Sumber Daya Air;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 04/PRT/M/2015 Tentang Kriteria Dan
                                                        Penetapan Wilayah Sungai (Berita Negara Republik Indonesia
                                                        Tahun 2015 Nomor 429);</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 07/PRT/M/2015 tentang Pantai;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 08/PRT/M/2015 tentang Penetapan
                                                        Garis Sempadan Jaringan Irigasi;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 10/PRT/M/2015 tentang Rencana dan
                                                        Rencana Teknis Tata Pengaturan Air dan Tata Pengairan;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 14/PRT/M/2015 Tentang Kriteria Dan
                                                        Penetapan Status Daerah Irigasi (BeritaNegara Republik
                                                        Indonesia Tahun 2015 Nomor 638);</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 18/PRT/M/2015 tentang Operasi dan
                                                        Pemeliharaan Sumber Daya Air;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 23/PRT/M/2015 tentang Pengelolaan
                                                        Aset Irigasi;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 28/PRT/M/2015 tentang Sempadan
                                                        Sungai dan Garis Sempadan Danau;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 30/PRT/M/2015 tentang
                                                        Pengembangan dan Pengelolaan Sistem Irigasi;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 01/PRT/M/2016 tentang Tata Cara
                                                        Perizinan Pengusahaan Sumber Daya Air dan Penggunaan
                                                        Sumber Daya Air;</li>
                                                    <li>Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat
                                                        Republik Indonesia Nomor 1 Tahun 2022 tentang Pedoman
                                                        Penyusunan Perkiraan Biaya Pekerjaan Konstruksi Bidang
                                                        Pekerjaan Umum dan Perumahan Rakyat;</li>
                                                    <li>Peraturan Daerah Provinsi Jawa Timur Nomor 11 Tahun 2016
                                                        tentang Pembentukan dan Susunan Perangkat Daerah
                                                        (Lembaran Daerah Provinsi Jawa Timur Tahun 2016 Nomor 1 Seri
                                                        C, Tambahan Lembaran Daerah Provinsi Jawa Timur Nomor 63),
                                                        sebagaimana telah diubah dengan Peraturan Daerah Provinsi
                                                        Jawa Timur Nomor 3 Tahun 2018 tentang Perubahan Peraturan
                                                        Daerah Provinsi Jawa Timur Nomor 11Tahun 2016 tentang
                                                        Pembentukan dan Susunan Perangkat Daerah (Lembaran Daerah
                                                        Provinsi Jawa Timur Tahun 2018 Nomor 1 Seri C, Tambahan
                                                        Lembaran Daerah Provinsi Jawa Timur Nomor 81);</li>
                                                    <li>Peraturan Daerah Provinsi Jawa Timur Nomor 18 Tahun 2016
                                                        tentang Pengelolaan Sungai (Lembaran Daerah Provinsi Jawa
                                                        Timur Tahun 2016 Nomor 12 Seri D, Tambahan Lembaran Daerah
                                                        Provinsi Jawa Timur Nomor 68);</li>
                                                    <li>Peraturan Daerah Nomor 9 Tahun 2019 tentang
                                                        Pengarusutamaan Gender (Lembaran Daerah Provinsi Jawa
                                                        Timur Tahun 2019 Nomor 7 Seri D, Tambahan Lembaran Daer ah
                                                        Provinsi Jawa Timur Nomor 96);</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 61 Tahun 2016 Tentang
                                                        Kedudukan, Susunan Organisasi, Uraian Tugas Dan Fungsi Serta
                                                        Tata Kerja Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa
                                                        Timur (Berita Daerah Provinsi Jawa Timur Tahun 2016 Nomor 61,
                                                        Seri E);</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 49 Tahun 2018 tentang
                                                        Nomenklatur, Susunan Organisasi, Uraian Tugas Dan Fungsi
                                                        Serta Tata Kerja Unit Pelaksana Teknis Dinas Pekerjaan Umum
                                                        Sumber Daya Air Provinsi Jawa Timur;</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 60 Tahun 2021 tentang
                                                        Kebijakan Pengelolaan Sistem Informasi Hidrologi,
                                                        Hidrometeorologi, dan Hidrogeologi pada Tingkat Provinsi;</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 105 Tahun 2021 tentang
                                                        Kedudukan, Organisasi, Uraian Tugas dan Fungsi Serta Tata Kerja
                                                        Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur;</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 35 Tahun 2023 tentang
                                                        Standar Biaya Umum Tahun 2024;</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 88 Tahun 2023 tentang
                                                        Pedoman Kerja dan Pelaksanaan Tugas;</li>
                                                    <li>Peraturan Gubernur Jawa Timur Nomor 1 Tahun 2024 tentang
                                                        Kebijakan Pengelolaan Sumber Daya Air.</li>
                                                </ol>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                                <!-- ======= About Us Section ======= -->
                                <section id="struktur" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <!--<h2>Struktur Organisasi Dinas PU Sumber Daya Air Provinsi Jawa Timur</h2>-->
                                            <div style="text-align:justify;"><img
                                                    src="{{ asset('asset/dokumen/' . $struktur->foto) }}" alt="image"
                                                    width="100%"></div>
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                                <!-- ======= About Us Section ======= -->
                                <section id="struktur" class="about" style="padding-bottom: 10px;">
                                    <div class="container" data-aos="fade-up">

                                        <div class="section-header">
                                            <h2>Daftar UPT</h2>
                                            <iframe src="https://hidrologi.dpuair.jatimprov.go.id/mapview2" width="100%"
                                                height="800px" style="border:none;"></iframe>
                                        </div>

                                    </div>
                                </section>
                                <!-- End About Us Section -->

                            </div>
                        </div>
                    </div>

                </div><!-- End blog posts list -->
            </div>



        </section><!-- End Blog Section -->





    </main><!-- End #main -->
@endsection
