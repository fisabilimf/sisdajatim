 @extends('layouts/app')

@section('body')


<div class="classifieds" style="margin-left:10px">
                        <div class="main-title-head">
                          <h3>Hasil Pencarian</h3>
            
                          <div class="clearfix"></div>
                        </div>
                        <div class="classified-grids">
                        	@foreach($headline as $key => $head)
                            		<div class="grid box">
                            			<div class="grid-header">
                            				<a class="gotosingle" href="{{url('main/detail/'.$head["id"])}}">{{$head['judul']}}</a>
                            				<ul>
                            				<li><span><b>{{$head["penulis"]}}</b>, {{$head["tanggal"]}}</span></li>
                            				<li><a href="#">{{$head['komentar']}} Komentar</a></li>
                            				</ul>
                            			</div>
                            			<div class="grid-img-content">
                            				<div class="col-sm-4">
                            					<div style="height:160px;width:100%">
                            				<a href="{{url('main/detail/'.$head["id"])}}">
                            					 @if($head["jenis_dokumentasi"] == "0")
                                                                  <img src="{{asset("asset/berita/".$head["foto"])}}" style="height:100%;width:100%"class="img-responsive"alt="">
                                                                  @else
                                                                   <iframe  width="100%" height="100%"src="https://www.youtube.com/embed/{{$head["foto"]}}">
                                                                   </iframe>
                                                                  @endif
                            				</a>
                            			</div>
                            			</div>
                            			<div class="col-sm-8">
                            				<p style="text-align:justify">{{$head["isi"]}}<a href="#">...</a></p>
                            			</div>
                            				<div class="clearfix"> </div>
                            			</div>
                            			<div class="comments">
                            				<ul>
                            					<!-- <li><a href="#"><img src="{{asset("asset/main/images/gres.png")}}" width="10%" title="view"  style="margin-left:15px"/></a>Dinas Pekerjaan Umum Sumber Daya Air</li> -->
                            
                            					<li><a class="readmore" style="margin-bottom:5px" href="{{url('main/detail/'.$head["id"])}}">ReadMore</a></li>
                            				</ul>
                            			</div>
                            			<div class="clearfix"> </div>
                            		</div>
                            		@endforeach
                          
                          
                            <div class="clearfix"></div>
                         
                                    
                                    
                                          @if($dokumen_count > 0)
                                           <table style="width:100%">
                                         
                                         <tbody>
                                          @foreach($dokumen as $dok)
                                            <tr >
                                                <td  style="width:88%;padding:10px 15px;border: 1px solid #ddd;border-radius:4px" >
                                                    @if($dok->link == "-")
                                                       <a class="fancybox" href="{{asset("asset/dokumen/".$dok->file)}}">
                                                       @else
                                                       <a  href="{{$dok->link}}" target="_blank">
                                                       @endif  
                                                        <span class="fa fa-cloud-upload text-green"></span> {{$dok->judul}} <span class="fa fa-angle-right arrow"></span> 
                                                        </a>
                                                </td>
                                                <td  style="width:12%;;padding:10px 15px;border: 1px solid #ddd;border-radius:4px">
                                                    
                                                            @if($dok->link == "-")
                                                            <span class="badge badge-red" style="background:#cd4b4b">File Doc</span>
                                                            @else
                                                             <span class="badge badge-blue">Link URL</span>
                                                            @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                             @endif
                                             
                                   
                          
                              <div class="clearfix"></div>
                        </div>
                    
                   
                       
                    </div>


@endsection