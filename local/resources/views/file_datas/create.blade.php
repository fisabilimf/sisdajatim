@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Tambah Dokumen/ Folder
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#" style="font-size: 15px;"><i class="fa fa-folder"></i> {{$name}}</a></li>

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
                 {!! Form::open(['url' => 'file_datas','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label >Jenis Data</label>
                      @if($tipe == 0)
                        {!! Form::select('tipe',['0'=>'Dokumen/File'],$tipe,['class'=>'form-control','required'=>'true','id'=>'tipe_data','readonly']) !!}
                        @else
                        {!! Form::select('tipe',['1'=>'Folder'],$tipe,['class'=>'form-control','required'=>'true','id'=>'tipe_data','readonly']) !!}
                        @endif
                    </div>
                    <div class="form-group">
                      <label >Nama</label>
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                        {!! Form::hidden('parent_id',$id,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    @if($tipe == '0')
                    <div class="form-group" id="file_input">
                      <label >file (Khusus Untuk Dokumen/File)</label>
                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                    </div>
                    @endif
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("file_datas/".$id)}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

     
  @endsection