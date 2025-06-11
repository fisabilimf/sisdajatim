 @extends('layouts/app')

@section('body')
    <div class="about-section">
          <div class="about-us">
       
            <div class="col-md-12">
              <div class="offer">
               
                <a href="#">Selayang Pandang</a>
                <div class="clearfix"></div>
                <div style="margin-left:15px"><?php echo ($profil->selayang); ?></div>
              </div>
              <div class="offer">
             
                <a href="#">Visi, Misi & Tugas</a>
                <div class="clearfix"></div>
                <div style="margin-left:15px"><?php echo ($profil->visi); ?></div>
              </div>
              <div class="offer">
              
                <a href="#">Struktur Organisasi Dinas PU Sumber Daya Air Provinsi Jawa Timur</a>
                <div class="clearfix"></div>
                <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/'.$struktur->foto)}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Bengawan Solo di Bojonegoro</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT BOJONEGORO.jpg')}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Sampean Setail di Bondowoso</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT BONDOWOSO.jpg')}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Brantas di Kediri</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT KEDIRI.jpg')}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Bondoyudo Baru di Lumajang</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT LUMAJANG.jpg')}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Kepulauan Madura di Pamekasan</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT PAMEKASAN.jpg')}}" alt="image" width="100%"></p>
              </div>
              <div class="offer">
              
               <a href="#">UPT PSDA WS Welang Pekalen di Pasuruan</a>
               <div class="clearfix"></div>
               <p style="margin-left:15px"> <img src="{{asset('asset/dokumen/UPT PASURUAN.jpg')}}" alt="image" width="100%"></p>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
         
    
@endsection