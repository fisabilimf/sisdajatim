@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Struktur Organisasi
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Struktur Organisasi</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                {!! Form::open(['url' => 'users/struktur_update','files'=>true]) !!}
                  <div class="box-body">
                    
                      <div class="form-group">
                      <label >Nama Kepala Dinas</label>
                    
                        {!! Form::text('selayang',$user->selayang,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                      <div class="form-group">
                      <label >NIP Kepala Dinas</label>
                    
                        {!! Form::text('visi',$user->visi,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                      <div class="form-group">
                      <label >Foto Struktur</label>
                    
                         <div class="fileupload fileupload-new" data-provides="fileupload" style="margin:0">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                          
                                                             <img src="{{ asset("asset/dokumen/".$user->foto)}}" alt="">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                        <div>
                                                         <span class="btn btn-default btn-file">
                                                         <span class="fileupload-new"><i class="fa fa-plus"></i> Select Foto</span>
                                                         <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                          {!! Form::file('foto1',['class'=>'default']) !!}
                                                      </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-ban"></i> Remove</a>
                      </div></div>
                    </div>
                      <div class="form-group">
                      
                    
                       
                         {!! Form::hidden('id',$dataid,['class'=>'form-control','required'=>'true']) !!}
                          {!! Form::hidden('foto',$user->foto,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection