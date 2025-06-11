@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Sosial Media
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Sosial Media</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::open(['url' => 'sosials','files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label >Nama</label>
                    
                        {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                   
                     <div class="form-group">
                      <label >Link URL</label>
                    
                        {!! Form::text('link',null,['class'=>'form-control']) !!}
                        <span style="color:red">Ditulis Lengkap contoh http://localhost</span>
                    </div>
                     <div class="form-group">
                      <label >  File Icon</label>
                    
                          <div class="fileupload fileupload-new" data-provides="fileupload" style="margin:0">
                                                      
                                                      
                                                        <div>
                                                         <span class="btn btn-default btn-file">
                                                         <span class="fileupload-new"><i class="fa fa-plus"></i> Select Icon</span>
                                                         <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                          {!! Form::file('icon',['class'=>'default']) !!}
                                                      </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-ban"></i> Remove</a>
                      </div></div>
                        <span style="color:red">Ukuran Icon 25 x 25</span>
                    </div>
                    
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button> <a class="btn btn-danger" href="{{url("sosials")}}">Kembali</a>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection