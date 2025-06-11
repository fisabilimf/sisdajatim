@extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
           <a class="btn btn-success" href="{{url('dokumens/create')}}">Tambah data</a> Dokumen
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Dokumen</a></li>
            
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Jenis Dokumen</th>
                <th>Nama Dokumen</th>
                <th>Detail Dokumen</th>
       
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td><b>{{$da->jenis_dokumen_data->name}} </b>{{$da->sub_jenis_dokumen_data->name}}</td>
                              <td>{{$da->judul}}</td>
                              <td>@if($da->link == "-")
                                <a href="{{asset("asset/dokumen/".$da->file)}}" class="fancybox">Lihat Dokumen</a>
                                @else
                                <a href="{{$da->link}}" target="_blank">Lihat URL</a>
                                @endif</td>
                          
                            
                              <td><a href="#inline1{{$da->id}}"class="btn bg-red xs fancybox" style="color:#fff"><i class="fa fa-trash"></i> Hapus</a></td>
                       <div id="inline1{{$da->id}}" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                     apakah Anda Yakin Untuk Menghapus Data Ini ?
                                                    <br><br>
                                                    <a href="{{url('dokumens/destroy/'.$da->id)}}" class = "btn btn-success">Ya, Hapus Data Ini</a>
                                              </div>

                            </tr>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection