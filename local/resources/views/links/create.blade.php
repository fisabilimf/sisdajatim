@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Aplikasi
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Aplikasi</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'link_data','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group has-success">
                      <label >Aplikasi</label>
                    
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group has-success">
                      <label >Link</label>
                    
                        {!! Form::text('link',null,['class'=>'form-control','required'=>'true']) !!}
                        <p>Ditulis Lengkap, Contoh http://localhost</p>
                    </div>
                      <div class="form-group">
                      <label >Foto</label>
                    
                         <div class="fileupload fileupload-new" data-provides="fileupload" style="margin:0">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                          
                                                             <img src="{{ asset("asset/admin/dist/img/uploadfile.png")}}" alt="">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                        <div>
                                                         <span class="btn btn-default btn-file">
                                                         <span class="fileupload-new"><i class="fa fa-plus"></i> Select Foto</span>
                                                         <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                          {!! Form::file('foto',['class'=>'default','required']) !!}
                                                      </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-ban"></i> Remove</a>
                      </div></div>
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("link_data")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection