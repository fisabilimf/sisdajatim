@extends('layouts2/app')

@section('body')
    <section id="sliderSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="slick_slider">
                    @foreach ($headline as $key => $value)
                        @if ($value['jenis_dokumentasi'] == '0')
                            <div class="single_iteam"> <a href="{{ url('main/detail/' . $value['id']) }}"> <img
                                        src="{{ asset('asset/berita/' . $value['foto']) }}" alt=""></a>
                                <div class="slider_article">
                                    <h2><a class="slider_tittle"
                                            href="{{ url('main/detail/' . $value['id']) }}">{{ $value['judul'] }}</a>
                                    </h2>
                                </div>
                            </div>
                        @else
                            <div class="single_iteam">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $value['foto'] }}">
                                </iframe>
                                <div class="slider_article">
                                    <h2><a class="slider_tittle"
                                            href="{{ url('main/detail/' . $value['id']) }}">{{ $value['judul'] }}</a>
                                    </h2>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Latest post</span></h2>
                    <div class="latest_post_container">
                        <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                        <ul class="latest_postnav">
                            <li>
                                @foreach ($galleri as $gal)
                                    @if ($gal->jenis == '0')
                                        <div class="media">
                                            <a href="{{ url('main/detail/' . $gal->id) }}" class="media-left">
                                                <img alt="" src="{{ asset('asset/berita/' . $gal->foto) }}">
                                            </a>
                                            <div class="media-body">
                                                <a href="{{ url('main/detail/' . $gal->id) }}"
                                                    class="catg_title">{{ $gal->judul }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                        <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    @foreach ($jenis_berita as $keys => $values)
                        <div class="single_post_content">
                            <h2><span>{{ $values->name }}</span></h2>
                            <?php $no = 1; ?>
                            @foreach ($berita_biasa[$values->id] as $key1 => $value1)
                                @if ($no == 1)
                                    <div class="single_post_content_left">
                                        <ul class="business_catgnav  wow fadeInDown">
                                            <li>
                                                <figure class="bsbig_fig"> <a
                                                        href="{{ url('main/detail/' . $value1['id']) }}"
                                                        class="featured_img">
                                                        @if ($value1['jenis_dokumentasi'] == '0')
                                                            <img alt=""
                                                                src="{{ asset('asset/berita/' . $value1['foto']) }}"> <span
                                                                class="overlay"></span>
                                                        @else
                                                            <iframe class="image" height="100%"
                                                                src="https://www.youtube.com/embed/{{ $value1['foto'] }}">
                                                            </iframe>
                                                        @endif
                                                    </a>
                                                    <figcaption> <a
                                                            href="{{ url('main/detail/' . $value1['id']) }}">{{ $value1['judul'] }}</a>
                                                    </figcaption>
                                                    <p>{{ $value1['tanggal'] }}
                                                    </p>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="single_post_content_right">
                                        <ul class="spost_nav">
                                            <li>
                                                <div class="media wow fadeInDown"> <a
                                                        href="{{ url('main/detail/' . $value1['id']) }}"
                                                        class="media-left">
                                                        @if ($value1['jenis_dokumentasi'] == '0')
                                                            <img alt=""
                                                                src="{{ asset('asset/berita/' . $value1['foto']) }}">
                                                        @else
                                                            <iframe class="media-left"
                                                                src="https://www.youtube.com/embed/{{ $value1['foto'] }}">
                                                            </iframe>
                                                        @endif
                                                    </a>
                                                    <div class="media-body"> <a
                                                            href="{{ url('main/detail/' . $value1['id']) }}"
                                                            class="catg_title">{{ $value1['judul'] }}</a>
                                                        <p>{{ $value1['tanggal'] }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                <?php $no++; ?>
                            @endforeach
                            <div class="single_post_content_right">
                                <ul class="spost_nav">
                                    <li>
                                        <div class="media wow fadeInDown">
                                            <a href="{{ url('main/berita_detail/' . $values->id) }}" class="btn btn-theme">
                                                More+
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>Agenda</span></h2>
                        <ul class="spost_nav">
                            @foreach ($data_agenda as $agenda)
                                <li>
                                    <div class="media wow fadeInDown"> <a href="{{ url('main/agenda') }}"
                                            class="media-left">

                                            <img alt="" src="{{ asset('asset/main_new/images/tanggal.png') }}">
                                        </a>
                                        <div class="media-body"> <a href="{{ url('main/agenda') }}"
                                                class="catg_title">{{ $agenda['judul'] }}</a> </div>
                                        <p>{{ $agenda['tanggal'] }}</p>
                                    </div>
                                </li>
                            @endforeach

                            <a class="btn btn-theme" href="{{ url('main/agenda') }}">More +</a>

                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
