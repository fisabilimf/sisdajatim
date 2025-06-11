@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Dokumen
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Dokumen</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'dokumens','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label >Judul Dokumen</label>
                    
                        {!! Form::text('judul',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Jenis Dokumen</label>
                    
                        {!! Form::select('jenis_dokumen_id',$jenis,null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Sub Jenis Dokumen (untuk SIH3)</label>
                    
                        {!! Form::select('sub_jenis_dokumen_id',$subjenis,null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label > <input type="radio" name="ra1" value="1"> Link URL</label>
                    
                        {!! Form::text('link',null,['class'=>'form-control']) !!}
                        <span style="color:red">Jika Dokumen Berupa Link URL</span>
                    </div>
                     <div class="form-group">
                      <label > <input type="radio" name="ra1" value="2"> File Dokumen</label>
                    
                          <div class="fileupload fileupload-new" data-provides="fileupload" style="margin:0">
                                                      
                                                      
                                                        <div>
                                                         <span class="btn btn-default btn-file">
                                                         <span class="fileupload-new"><i class="fa fa-plus"></i> Select Dokumen</span>
                                                         <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                          {!! Form::file('file_dokumen',['class'=>'default']) !!}
                                                      </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-ban"></i> Remove</a>
                      </div></div>
                        <span style="color:red">Jika Dokumen Berupa File</span>
                    </div>
                    
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("dokumens")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection