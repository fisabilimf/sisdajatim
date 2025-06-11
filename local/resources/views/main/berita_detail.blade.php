@extends('layouts/app')

@section('body')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" style="background-image: url('');">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>{{ $detail->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>{{ $detail->name }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4 posts-list">

                    @foreach ($headline as $key => $head)
                        <div class="col-xl-4 col-md-6">
                            <article>

                                <div class="post-img">
                                    @if ($head['jenis_dokumentasi'] == '0')
                                        <img src="{{ asset('asset/berita/' . $head['foto']) }}" class="img-fluid"
                                            alt="" style="height: 250px;margin: auto;display: flex;">
                                    @else
                                        <img src="{{ asset('asset/main/images/play.png') }}" class="img-fluid"
                                            alt="" style="height: 250px;margin: auto;display: flex;">
                                    @endif
                                </div>

                                <p class="post-category">{{ $detail->name }}</p>

                                <h2 class="title">
                                    <a
                                        href="{{ url('main/detail/' . $head['id']) }}" title="{{$head['judul']}}">{{ substr($head['judul'], 0, 40) }}...</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <div class="post-meta">
                                        <p class="post-author-list">{{ $head['penulis'] }}</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">{{ $head['tanggal'] }}</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    @endforeach

                </div><!-- End blog posts list -->

                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <?php echo $head_data->render(); ?>
                    </ul>
                </div><!-- End blog pagination -->

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
