<style>
.email{
  width: 100%;
padding: 5px 10px;
border: none;
font-size: 0.9em;
font-weight: 600;
color: #202021;
outline: none;
background: #fff;
font-weight: 400;
border: 1px solid #bababa;
margin: 5px 0;

}
</style>
       <div class="might">
                 @foreach($galleri as $gal)
                <div class="might-grid">
                
                    <div class="grid-might">
                        <a href="{{url('main/detail/'.$gal->id)}}">
                             <div class="video" style="width:100%;height:60px">
                           @if($gal->jenis == "0")
                                        <img src="{{asset("asset/berita/".$gal->foto)}}" alt="image" height="100%">
                                      @else
                                        <iframe class="image" height="60px" width="100%" src="https://www.youtube.com/embed/{{$gal->foto}}">
                                        </iframe>
                                      @endif
                                  </div>
                                  </a>
                    </div>
                    <div class="might-top">
                        <p>{{$gal->judul}}<br><a href="{{url('main/detail/'.$gal->id)}}">Read More <i> </i></a></p> 
                        
                    </div>
                <div class="clearfix"></div>

                </div>
           @endforeach
            </div>
                        
                    <div class="popular" style="margin-top:2.2em">
                        <div class="main-title-head">
                            <h5>Agenda Penting</h5>
                            
                            <div class="clearfix"></div>
                        </div>      
                        <div class="popular-news">
                            @foreach($data_agenda as $agenda)
                            <div class="popular-grid">
                                <i>{{$agenda['tanggal']}}</i>
                                <p>{{$agenda['judul']}}</p><p> <a href="{{url("main/agenda")}}">Read More</a></p>
                             
                            </div>
                            @endforeach
                           
                            <a class="more" href="{{url("main/agenda")}}">More  +</a>
                        </div>
                    </div>
                    <!--<div class="sign_up text-center">-->
                    <!--    <h3>Saran & Pengaduan</h3>-->
                    <!--    <p class="sign">Masukan Saran Dan Pengaduan Anda</p>-->
                    <!--     @if (Session::has('message'))-->
                    <!--        <div class="alert {{ Session::get('alert') }} fade in"><button aria-hidden="true" data-dismiss="alert" class="close" type="button" >×</button><b style="font-size:11px">{{ Session::get('message') }}</b></div>-->
                    <!--    @endif  -->
                    <!--    {!! Form::open(['url' => 'main/saran_store']) !!}-->
                            
                    <!--        <input class="email" type="email" name="email" placeholder="Email Address" required="required">-->
                    <!--         {{ csrf_field() }}-->
                    <!--        <textarea style='width:100%;margin-bottom:10px'  rows="3" name="isi" required="required"></textarea>-->
                            

                    <!--         {!! captcha_img(); !!}-->
                    <!--         <input type="text" name="captcha" required="required">-->
                             
                    <!--        <input type="submit" value="Kirim">-->
                    <!--    {!! Form::close() !!}-->
                    <!--    <p class="spam">Pastikan bahwa kiriman anda valid !</p>-->
                    <!--</div>-->
                    
                    <div class="sign_up text-center">
                        <h3>Upload Data SIH 3</h3>
                        <p class="sign">Masukkan Data SIH 3 Anda</p>
                        
                        <form action="https://forms.gle/DRb63Nkye48boNFC9">
                        <input style=" margin: 0 auto;" type="submit" value="Halaman Upload Data">
                        </form>
                        
                        {!! Form::close() !!}
                       
                    </div>
                    <div class="clearfix"></div>
                