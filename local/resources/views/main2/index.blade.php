@extends('layouts/app')

@section('body')
     
               
                    <div class="slider">
                        
                        
                         <div class="conference-slider">
                            <!-- Slideshow 3 -->
                            <ul class="conference-rslide" id="conference-slider">
                              @foreach($headline as $key => $value)
                              <li>

                                  @if($value["jenis_dokumentasi"] == "0")
                                <a href="{{url('main/detail/'.$value["id"])}}">
                                    <img height="100%" src="{{asset("asset/berita/".$value["foto"])}}" alt="" style="float: none;margin: 0 auto;width:auto">
                                   @else
                                       <iframe  width="100%" height="100%"src="https://www.youtube.com/embed/{{$value["foto"]}}">
                                       </iframe>
                                      @endif
                                  <div class="breaking-news-title">
                                <p>{{$value["judul"]}}</p>
                            </div></a>
                              </li>

                               @endforeach
                            </ul>
                            <!-- Slideshow 3 Pager -->
                            <ul id="slider3-pager">
                              @foreach($headline as $key => $value)
                              <li ><a href="#">
                                 @if($value["jenis_dokumentasi"] == "0")
                                <img height="100%" src="{{asset("asset/berita/".$value["foto"])}}" alt="">
                                  @else
                                       <iframe  width="100%" height="100%"src="https://www.youtube.com/embed/{{$value["foto"]}}">
                                       </iframe>
                                      @endif
                              </a></li>
                              @endforeach
                            </ul>
                          
                        </div> 
                        <h5 class="breaking">Headline news</h5>
                    </div>  
                <div class="posts">
                    <div class="left-posts">
                      @foreach($jenis_berita as $keys => $values)
                        <div class="world-news">
                            <div class="main-title-head">
                                <h3>{{$values->name}}</h3>
                                <a href="{{url("main/berita_detail/".$values->id)}}">More  +</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="world-news-grids">
                              @foreach($berita_biasa[$values->id] as $key1 => $value1)
                                <div class="world-news-grid">
                                  <div class="gambar-grid" style="height: 190px;background: #c9c9ce;text-align: center;">
                                     @if($value1["jenis_dokumentasi"] == "0")
                                        <img height="100%"src="{{asset("asset/berita/".$value1["foto"])}}" alt="image" style="width: auto;">
                                      @else
                                        <iframe class="image"  height="100%" src="https://www.youtube.com/embed/{{$value1["foto"]}}">
                                        </iframe>
                                      @endif
                                    </div>
                                    <a href="{{url('main/detail/'.$value1["id"])}}" class="title">{{ $value1["judul"]}}</a>
                                    <!--<p style="text-align:justify"><?php echo $value1["isi"]; ?></p>-->
                                    <a href="{{url('main/detail/'.$value1["id"])}}">{{$value1["tanggal"]}}</a>
                                </div>
                                @endforeach
                               
                              
                            
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                
                    <div class="clearfix"></div>    
                </div>
               
            
          @endsection