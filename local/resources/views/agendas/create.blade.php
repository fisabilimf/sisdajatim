@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Agenda
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Agenda</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'agendas','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label >Judul Agenda</label>
                    
                        {!! Form::text('judul',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Tempat</label>
                    
                        {!! Form::text('tempat',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Tanggal Mulai</label>
                    
                        {!! Form::text('tanggal_mulai',null,['class'=>'form-control tanggal','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Tanggal Selesai</label>
                    
                        {!! Form::text('tanggal_selesai',null,['class'=>'form-control tanggal','required'=>'true']) !!}
                    </div>
                   
                     <div class="form-group">
                      <label >Deskripsi</label>
                    
                        {!! Form::textarea('deskripsi',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("agendas")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection