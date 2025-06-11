@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Jenis Dokumen
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Jenis Dokumen</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'jenis_dokumens','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                      <label >Jenis Dokumen</label>
                    
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("jenis_dokumens")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection