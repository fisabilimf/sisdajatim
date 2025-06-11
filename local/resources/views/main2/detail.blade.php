 @extends('layouts/app')

@section('body')
        <div class="grids" style="margin-top:10px">
        <div class="msingle-grid box">
            <div class="grid-header">
                <h3>{{$headline["judul"]}}</h3>
                <ul>
                <li><span>Ditulis Oleh {{$headline["penulis"]}}, Tanggal {{$headline["tanggal"]}}</span></li>
                <li><a href="#">{{$komen_count}} Komentar</a></li>
                </ul>
            </div>
            <div class="singlepage">
                            <a href="#">
                              @if($headline["jenis_dokumentasi"] == "0")
                                      <img src="{{asset("asset/berita/".$headline["foto"])}}" class="img-responsive"alt="">
                                      @else
                                       <iframe  width="100%" height="500"src="https://www.youtube.com/embed/{{$headline["foto"]}}">
                                       </iframe>
                                      @endif
                                  </a>
                           <div class="clearfix"> </div>
                        </div>
                        <div class="single">
                             @if($headline["kutipan"] != "" && $headline["kutipan"] != "-")
                        <blockquote><i>{{$headline["kutipan"]}}</i></blockquote>
                        @endif
                        </div>

                            <div class="story-review">
                      <p style="text-align:justify"><?php echo $headline["isi"]?></p>
                            </div>
        </div>
    
            <div class="clearfix"> </div>

    </div>
        @foreach($komentar as $key => $value)
        <ul class="comment-list">
                   <h5 class="post-author_head"> <a href="#" title="Posts by " rel="author"><b>{{$value["name"]}}</b> - <i>{{$value["tanggal"]}}</i></a></h5>
               
                   <li>
                     
                     <img src="{{asset("asset/main/images/user.png")}}" class="img-responsive col-sm-2"alt="">
                       
                   <div class="desc col-sm-10">
                   {{$value["isi"]}}
                   </div>
                   <div class="clearfix"></div>
                   </li>
             
              </ul>
                    @endforeach
     <div class="content-form" style="margin-top:20px">
                     <h3>Isi Komentar Anda</h3>
                      {!! Form::open(['url' => 'main/komentar_store']) !!}
                        <input type="text" placeholder="Name" name="name" required/>
                        <input type="text" placeholder="Email" name="email" required/>
                         <input type="hidden" value="{{$headline["id"]}}" name="berita_id" class="form-control">
                        <textarea placeholder="Comment" name="isi"class="form-control" rows="3" required="true"></textarea>
                         <input type="submit" value="Kirim Komentar"/>
                   </form>
                     {!! Form::close() !!}
                 </div>
    

        @endsection