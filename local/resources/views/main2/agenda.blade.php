@extends('layouts/app')

@section('body')
     
 
                <div class="posts" style="margin-top:1.6em">
                    <div class="left-posts">
                    <div class="tech-news">
                        <div class="main-title-head">
                          <h3>Agenda</h3>
            
                          <div class="clearfix"></div>
                        </div>  
                        <div class="tech-news-grids">
                           <?php $i=0;$datai=0;?>
                          @foreach($agenda_data as $key => $ad)
                           @if($i == $datai)
                     
                      <?php $datai = $datai+2; ?>
                    @endif
                            <div class="tech-news-grid col-sm-6" >
                              <a href="#">{{ucfirst(strtolower($ad["judul"]))}}</a>
                              <p>{{$ad["deskripsi"]}}</p>
                              <p><a href="#">{{$ad["tanggal"]}}</a></p>
                               <p> |  {{$ad["tempat"]}}</p>
                            </div>
                          <?php $i++;?>

                     @if($i == $datai)
                        <div class="clearfix"  style="margin-bottom:30px"></div>
                        
                         @endif
                           @endforeach
                    
                       
                      
                          <div class="clearfix"></div>
                        </div>
                      </div>
                        
                    </div>
                
                    <div class="clearfix"></div>    
                </div>
               
            
          @endsection