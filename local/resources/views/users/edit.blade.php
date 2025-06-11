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
                {!! Form::model($user,['method' => 'PATCH','route'=>['users.update',$user->id],'files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                    <label style="font-size:13px"><b>Nama Lengkap</b></label>
                       {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                 
                    </div>
                   
                     <div class="form-group has-success">
                    <label style="font-size:13px"><b>Email</b></label>
                      {!! Form::email('email',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                   
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                     <button type="submit" class="btn btn-danger">Update Data</button> 
                    <a class="btn btn-success" href="{{url('users')}}">Kembali</a> 
                    <a class="btn btn-primary" href="{{url('users/password/'.$user->id)}}">Ubah Password</a>
                     <a href="#inline1" class="fancybox btn btn-warning " >Hapus Akun Ini</a>

                      <div id="inline1" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                    Apakah Anda Yakin Menghapus Akun Ini ?
                                                    <br><br>
                                                    <a href="{{url('users/hapus/'.$user->id)}}" class = "btn btn-danger">Ya, Hapus Data Ini</a>
                                              </div>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection