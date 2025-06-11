@extends('layouts/app')

@section('body')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Dewan Sumber Daya Air</h2>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Dewan Sumber Daya Air</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">

                    <div class="home-wrapper">
                        <div class="home-content">
                            <h2 class="osLight"><b></b></h2>
                            <div class="col-md-12">
                                <div class="offer">
                                    <a href="#">Dewan Sumber Daya Air</a>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="offer">
                                    <p style="margin-left:15px">Dewan Sumber daya air adalah </p>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="offer">
                                    <a href="#">Test Gambar Dewan Sumber Daya Air</a>
                                    <div class="clearfix"></div>
                                    <p style="margin-left:15px"> <img
                                            src="{{ asset('asset/berita/ctUrEv1C2O-hidrologi fix.jpg') }}" alt="image"
                                            width="100%"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- End blog posts list -->
            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
