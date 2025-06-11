@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Jenis Berita
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Jenis Berita</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::model($jb,['method' => 'PATCH','route'=>['jenis_beritas.update',$jb->id],'files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                      <label >Jenis Berita</label>
                    
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button> <a class="btn btn-danger" href="{{url("jenis_beritas")}}">Kembali</a>
                    <a class="btn btn-warning fancybox" href="#inline1">Hapus</a>
                       <div id="inline1" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                    apakah Anda Yakin Untuk Menghapus Data Ini ?
                                                    <br><br>
                                                    <a href="{{url('jenis_beritas/destroy/'.$jb->id)}}" class = "btn btn-success">Ya, Hapus Data Ini</a>
                                              </div>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection