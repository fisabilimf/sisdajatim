@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Ubah Dokumen/ Folder
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> {{$find->name}}</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
                @if (Session::has('message'))
      <div class="alert {{ Session::get('alert') }} fade in" style="margin-bottom: 5px;">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><strong>{{ Session::get('message') }}</strong>
      </div>
    @endif 
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::model($find,['method' => 'PATCH','route'=>['file_datas.update',$find->id],'files'=>true]) !!}
                 <div class="box-body">
                    <div class="form-group">
                      <label >Jenis Data</label>
                         @if($find->tipe == 0)
                        {!! Form::select('tipe',['0'=>'Dokumen/File'],null,['class'=>'form-control','required'=>'true','id'=>'tipe_data','readonly']) !!}
                        @else
                        {!! Form::select('tipe',['1'=>'Folder'],null,['class'=>'form-control','required'=>'true','id'=>'tipe_data','readonly']) !!}
                        @endif
                    </div>
                    <div class="form-group">
                      <label >Nama</label>
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    @if($find->tipe == 0)
                    <div class="form-group" id="file_input">
                      <label >file (Khusus Untuk Dokumen/File)</label>
                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                        <p style="margin-top:15px"><a href="{{asset('asset/bank_dokumen/'.$find->file)}}">Lihat File Sebelumnya</a></p>
                    </div>
                    @endif
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button> <a class="btn btn-danger" href="{{url("file_datas/".$find->parent_id)}}">Kembali</a>
                    <a class="btn btn-warning fancybox" href="#inline1">Hapus</a>
                       <div id="inline1" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                    apakah Anda Yakin Untuk Menghapus Data Ini ?
                                                    <br><br>
                                                    <a href="{{url('file_datas/destroy/'.$find->id)}}" class = "btn btn-success">Ya, Hapus Data Ini</a>
                                              </div>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection