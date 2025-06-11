@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Ubah Data Pengguna
 
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
                {!! Form::open(['url' => 'users/update_password','files'=>true]) !!}
                  <div class="box-body">
                      <div class="form-group has-error">
                    <label style="font-size:13px"><b>Password</b></label>
                   
                      <input name="password" class="form-control" type="password" required="true" />
                    </div>
                     <div class="form-group has-error">
                    <label style="font-size:13px"><b>Konfirmasi Password</b></label>
                       <input name="password_confirmation" class="form-control" type="password" required="true" />
                    </div>
                    {!! Form::hidden('id',$id,['class'=>'form-control','required'=>'true']) !!}
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" class="btn btn-danger">Simpan Data</button> <a class="btn btn-success" href="{{route('users.edit',$id)}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection