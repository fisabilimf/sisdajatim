@extends('layouts/admin-main')

@section('body')
  <section class="content-header">
          <h1>
            Berita
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-folder"></i> Berita</a></li>

          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 {!! Form::model($jberita,['method' => 'PATCH','route'=>['beritas.update',$jberita->id],'files'=>true]) !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label >Judul Berita</label>
                    
                        {!! Form::text('judul',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Jenis Berita</label>
                    
                        {!! Form::select('jenis_berita_id',$jenis,null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Tanggal</label>
                    
                        {!! Form::text('tanggal',date('d-m-Y',strtotime($jberita->tanggal)),['class'=>'form-control tanggal','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Status Berita</label>
                    
                        {!! Form::select('status',['0'=>'Berita Biasa','1'=>'Headline'],null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                     <div class="form-group">
                      <label >Kutipan Berita</label>
                    
                        {!! Form::text('kutipan',"-",['class'=>'form-control']) !!}
                    </div>
                    @if($jberita->jenis == "0")
                      <div class="form-group">
                      <label >Foto</label>
                    
                         <div class="fileupload fileupload-new" data-provides="fileupload" style="margin:0">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                          
                                                             <img src="{{ asset("asset/berita/".$jberita->foto)}}" alt="">
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
                     {!! Form::hidden('foto',null,['class'=>'form-control','required'=>'true']) !!}
                    @else
                    <div class="form-group">
                      <label >Link Video Youtube</label>
                    
                        {!! Form::text('foto',null,['class'=>'form-control']) !!}
                    </div>
                    @endif
                    {!! Form::hidden('jenis',null,['class'=>'form-control','required'=>'true']) !!}
                     <div class="form-group">
                      <label >isi Berita</label>
                      <!--<textarea name="isi" id="ckeditor" value="{{$jberita->ii}}"></textarea>-->
                    
                        {!! Form::textarea('isi',null,['id'=>'ckeditor','class'=>'form-control','required'=>'true']) !!}
                    </div>
                  
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button> <a class="btn btn-danger" href="{{url("beritas")}}">Kembali</a>
                     <a class="btn btn-warning fancybox" href="#inline1">Hapus</a>
                       <div id="inline1" style="width:400px;display: none;">
                                                    <h3><strong style="color:#000">Delete Confirmation</strong></h3><br>
                                                     apakah Anda Yakin Untuk Menghapus Data Ini ?
                                                    <br><br>
                                                    <a href="{{url('beritas/destroy/'.$jberita->id)}}" class = "btn btn-success">Ya, Hapus Berita Ini</a>
                                              </div>
                  </div>
                 {!! Form::close() !!}
             
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

      
  @endsection