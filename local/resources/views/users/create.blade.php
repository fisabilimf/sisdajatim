@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Tambah Data Pengguna
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Data Pengguna</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  {!! Form::open(['url' => 'users','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                    <label style="font-size:13px"><b>Nama Lengkap</b></label>
                       {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                 
                    </div>
                 
                     <div class="form-group has-success">
                    <label style="font-size:13px"><b>Email</b></label>
                      {!! Form::email('email',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group has-error">
                    <label style="font-size:13px"><b>Password</b></label>
                   
                      <input name="password" class="form-control" type="password" required="true" />
                    </div>
                     <div class="form-group has-error">
                    <label style="font-size:13px"><b>Konfirmasi Password</b></label>
                       <input name="password_confirmation" class="form-control" type="password" required="true" />
                    </div>
                
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a href="{{url('users')}}"class="btn btn-danger">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection