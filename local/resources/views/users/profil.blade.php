@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Sarana Prasarana
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Sarana Prasarana</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                {!! Form::open(['url' => 'users/profil_update','files'=>true]) !!}
                  <div class="box-body">
                    
                      <div class="form-group">
                      <label >Selayang Pandang</label>
                    
                        {!! Form::textarea('selayang',$user->selayang,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                      <div class="form-group">
                      <label >Visi & Misi</label>
                    
                        {!! Form::textarea('visi',$user->visi,['class'=>'form-control','id'=>'ckeditor','required'=>'true']) !!}
                         {!! Form::hidden('id',$dataid,['class'=>'form-control','required'=>'true']) !!}
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