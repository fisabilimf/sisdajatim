 @extends('layouts/app')

@section('body')


<div class="classifieds" style="margin-left:10px">
                        <div class="main-title-head">
                          <h3>{{$jenis->name}}</h3>
            
                          <div class="clearfix"></div>
                        </div>
                        <div class="classified-grids">
                        
                            @if($jenis->id != 5)
                                    
                                    
                                          @if($dokumen_count > 0)
                                           <table style="width:100%">
                                         <thead >
                                             <tr >
                                                 <td style="width:88%"  ><input class="form-control search-input" xcolumn="0" type="text" placeholder="Cari . . ." style="margin-bottom:15px"></td>
                                                 <td style="width:12%" ><input class="form-control search-input" xcolumn="1" type="text" placeholder="Cari . . ."style="margin-bottom:15px"></td>
                                                 </tr>
                                             </thead>
                                         <tbody id="table-custom">
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
                                             
                                   
                            @else
                              
                                 @if($dokumen_count > 0)
                                 @foreach($subjenis as $sub)
                                    <h5 style="margin:15px 0 10px 0 "><b><i class="fa fa-check"></i> {{$sub->name}}</b></small></h5>
                                     <table style="width:100%">
                                         <thead >
                                             <tr >
                                                 <td style="width:88%"  ><input class="form-control search-input-{{$sub->id}}" xcolumn="0" type="text" placeholder="Cari . . ." style="margin-bottom:15px"></td>
                                                 <td style="width:12%" ><input class="form-control search-input-{{$sub->id}}" xcolumn="1" type="text" placeholder="Cari . . ."style="margin-bottom:15px"></td>
                                                 </tr>
                                             </thead>
                                         <tbody id="table-custom-{{$sub->id}}">
                                       @foreach($dokumen as $dok)
                                       @if($dok->sub_jenis_dokumen_id == $sub->id)
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
                                       @endif
                                      @endforeach
                                      
                                            </tbody>
                                   </table>
                                      @endforeach
                                
                                   
                                    @endif
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    
                   
                       
                    </div>


@endsection