 @extends('layouts/app')

@section('body')
<?php $i=0;$datai=0;?>


   <div class="technology" style="margin-top:10px">
            <div class="tech-main">
               <?php $i=0;$datai=0;?>
        @foreach($data_galleri as $key => $value)   
          @if($i == $datai)
                      <?php $datai = $datai+3; ?>
                    @endif 
              <a href="{{asset("asset/berita/".$value["foto"])}}" class="fancybox">   
              <div class="col-md-4 tech">
                <div style="height:160px">
               <img style="height:100%" src="{{asset("asset/berita/".$value["foto"])}}" alt="" />
              </div>
              <div style="margin-bottom:15px">
                <a class="power"  href="#">{{$value["judul"]}}</a>
              </div>
              </div>
            </a>
                 <?php $i++;?>
                     @if($i == $datai)
                          <div class="clearfix"></div>
                        
                         @endif
                @endforeach
         
              <div class="clearfix"></div>
            </div>
          </div>
       
    

         
    
@endsection