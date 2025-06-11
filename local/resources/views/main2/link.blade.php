 @extends('layouts/app')

@section('body')
<div class="classifieds" style="margin-left:10px">
                        <div class="main-title-head">
                          <h3>Aplikasi</h3>
            
                          <div class="clearfix"></div>
                        </div>
                        <div class="classified-grids">
                            @foreach($data as $da)
                            <a href="{{$da->link}}">
                                <div class="classified-grid"  style="margin-bottom:50px" >
                                    <img src="{{asset('asset/aplikasi/'.$da->foto)}}" style="width:100%">
                                    <h4>{{$da->name}}</h4>
                                </div>
                            </a>
                            @endforeach
                           
                            <div class="clearfix"></div>
                        </div>
                    
                   
                       
                    </div>
                
        @endsection