@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Ruang Lingkup
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Ruang Lingkup</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'lingkups','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                      <label >Ruang Lingkup</label>
                    
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("lingkups")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection