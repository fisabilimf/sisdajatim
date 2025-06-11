@extends('layouts/app')

@section('body')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Agenda</h2>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Agenda</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">
                    <?php $i = 0;
                    $datai = 0; ?>
                    @foreach ($agenda_data as $key => $ad)
                        @if ($i == $datai)
                            <?php $datai = $datai + 2; ?>
                        @endif
                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset/main/images/agenda.png') }}" class="img-fluid" alt=""
                                        style="margin: auto;display: flex;">
                                </div>

                                <p class="post-category">{{ $ad['tanggal'] }}</p>

                                <h2 class="title">
                                    <a href="#">{{ ucfirst(strtolower($ad['judul'])) }}</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <div class="post-meta">
                                        <p class="post-author-list">{{ $ad['tempat'] }}</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">{{ $ad['deskripsi'] }}</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    @endforeach

                </div><!-- End blog posts list -->

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
