<div class="col-lg-4">

    <div class="sidebar">

        <div class="sidebar-item tags">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="mt-3">
                @foreach ($jenis_berita as $keys => $values)
                    <li><a href="{{ url('main/berita_detail/' . $values->id) }}">{{ $values->name }}<span>({{ $values->total }})</span>
                        </a></li><br>
                @endforeach
            </ul>
        </div><!-- End sidebar categories-->

        <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Highlight</h3>

            <div class="mt-3">
                @foreach ($galleri as $gal)
                    <div class="post-item">
                        @if ($gal->jenis == '0')
                            <img src="{{ asset('asset/berita/' . $gal->foto) }}" alt="image">
                        @else
                            <img src="{{ asset('asset/main/images/play.png') }}" alt="image">
                        @endif
                        <div>
                            <h4><a href="{{ url('main/detail/' . $gal->id) }}" title="{{$gal->judul}}">{{ substr($gal->judul, 0, 17) }}..</a>
                            </h4>
                            <time datetime="2020-01-01">{{ $gal->tanggal }}</time>
                        </div>
                    </div><!-- End recent post item-->
                @endforeach

            </div>

        </div><!-- End sidebar recent posts-->

    </div><!-- End Blog Sidebar -->

</div>
