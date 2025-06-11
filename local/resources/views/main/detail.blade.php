@extends('layouts/app')

@section('body')
    <?php
    $id_kat = 0;
    foreach ($jenis_berita as $keys => $values) {
        if ($values->name == $headline['jenis']) {
            $id_kat = $values->id;
        }
    }
    ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h3>{{ $headline['judul'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('main/berita_detail/' . $id_kat) }}">{{ $headline['jenis'] }}</a></li>
                    <li>{{ substr($headline['judul'], 0, 15) }}...</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img">
                            @if ($headline['jenis_dokumentasi'] == '0')
                                <img src="{{ asset('asset/berita/' . $headline['foto']) }}" class="img-fluid"
                                    alt="">
                            @else
                                <iframe width="100%"
                                    height="400px"src="https://www.youtube.com/embed/{{ $headline['foto'] }}">
                                </iframe>
                            @endif
                        </div>

                        <h2 class="title">{{ $headline['judul'] }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                    <a href="#">{{ $headline['penulis'] }}</a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                    <a href="#"><time datetime="2020-01-01">{{ $headline['tanggal'] }}</time></a>
                                </li>
                            </ul>
                        </div><!-- End meta top -->
                        <div class="content">
                            <?php echo $headline['isi']; ?>
                            <br><br>

                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="{{ url('main/berita_detail/' . $id_kat) }}">{{ $headline['jenis'] }}</a></li>
                            </ul>

                        </div><!-- End meta bottom -->

                    </article><!-- End blog post -->

                </div>

                @include('layouts.sideright')

            </div>

        </div>
    </section><!-- End Blog Details Section -->
@endsection
