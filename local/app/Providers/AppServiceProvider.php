<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jenis_dokumens;
use App\Jenis_beritas;
use App\Galleri_datas;
use App\Beritas;
use App\Sosials;
use App\Agendas;
use App\Sub_jenis_dokumens;
use App\Menus;
use App\Sub_menus;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

     function hari($hari){
       
                $daylist = array(
                 'Sun' => 'Minggu',
                 'Mon' => 'Senin',
                'Tue' => 'Selasa',
                 'Wed' => 'Rabu',
                 'Thu' => 'Kamis',
                  'Fri' => 'Jumat',
                  'Sat' => 'Sabtu'
                );
                return $daylist[$hari];
    } 

     function bulan($bul){

                $monthlist = array(
                 '01' => 'Januari',
                 '02' => 'Pebruari',
                '03' => 'Maret',
                 '04' => 'April',
                 '05' => 'Mei',
                  '06' => 'Juni',
                  '07' => 'Juli',
                  '08' => 'Agustus',
                 '09' => 'September',
                  '10' => 'Oktober',
                  '11' => 'Nopember',
                  '12' => 'Desember'
                );
                return $monthlist[$bul];
    } 
    public function boot()
    {
        //

        view()->composer('layouts.sideright',
            function($view)
            {
                $gallery = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->OrderBy('id','DESC')->take('6')->get();
                $galleri = array();
                foreach ($gallery as $keys => $values) {
                    $values->judul = $this->limit_words($values->judul, 10);
                    $galleri[] = $values;
                }

                $jenis_berita = Jenis_beritas::where('del','=',0)->get();
                foreach ($jenis_berita as $key => $val) {
                    $val->total = Beritas::where('del','=',0)->where('jenis_berita_id','=',$val->id)->count();
                }

                $view->with('galleri',$galleri);
                $view->with('jenis_berita',$jenis_berita);
            }
        );
        
        view()->composer('layouts.app', 
            function($view)
                {
                    $data_dokumen = Jenis_dokumens::where('del','=',0)->get();
                    $data_berita = Jenis_beritas::where('del','=',0)->get();
                    $agenda = Agendas::where('del','=',0)->OrderBy('tanggal_selesai','DESC')->OrderBy('id','DESC')->take(5)->get();

                        $agenda_data = array();
                        foreach ($agenda as $key => $value1) {
                            $agenda_data[$key]["judul"] = $value1->judul;
                            $agenda_data[$key]["deskripsi"] = $value1->deskripsi;
                            $agenda_data[$key]["tempat"] = $value1->tempat;
                            if($value1->tanggal_mulai == $value1->tanggal_selesai){
                                $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai));
                            }else{
                                 $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai))." - ".$this->hari(date('D',strtotime($value1->tanggal_selesai)))." ".date('d',strtotime($value1->tanggal_selesai))." ".$this->bulan(date('m',strtotime($value1->tanggal_selesai)))." ".date('Y',strtotime($value1->tanggal_selesai));
                            }
                            # code...
                        }

                         $gallery = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->OrderBy('id','DESC')->take('6')->get();
                         $galleri = array();
                         foreach ($gallery as $keys => $values) {
                              $values->judul = $this->limit_words($values->judul, 10);
                              $galleri[] = $values;
                         }

                    $sosmed  = Sosials::where('del','=',0)->get();
                    
                     $subjenis = Sub_jenis_dokumens::where('id','!=','1')->get();
                         $menu = Menus::where('del','=',0)->orderBy('urutan','ASC')->get();
           
                     foreach ($menu as $key => $value) {
                        if($value->tipe == 0){
                        if($value->from == 'jenis_beritas'){
                            $value->name = $value->jenis_berita_id->name;
                            $value->link_data = 'main/'.$value->link.'/'.$value->from_id;
                        }else if($value->from == 'custom'){
                            $value->link_data = $value->link;
                        }else{
                            $value->name = $value->jenis_dokumen_id->name;
                            $value->link_data = 'main/'.$value->link.'/'.$value->from_id;
                        }
                        }
                      
                        $sub[$value->id] = Sub_menus::where('del','=',0)->where('menu_id','=',$value->id)->get();
                            foreach ($sub[$value->id] as $keys => $values) {
                                if($values->from_id != 0){
                                    $values->link_data = 'main/'.$values->link.'/'.$values->from_id;
                                    if($value->from == 'jenis_beritas'){
                                        $values->name = $values->jenis_berita_id->name;
                                    }else{
                                         $values->name = $values->jenis_dokumen_id->name;
                                    }
                                }else{
                                     $values->name = $values->from;
                                     $values->link_data = $values->link;
                                }
                              
                        
                     }
                }

                $tgl = date('D-d-m-Y');
                $tgl = explode('-',$tgl);
                $d_hari = $this->hari($tgl[0]).' , '.$tgl[1].' '.$this->bulan($tgl[2]).' '.$tgl[3];
                // dd($d_hari);

                    $view->with('d_hari',$d_hari);
                    $view->with('menu',$menu);
                    $view->with('sub',$sub);
                    $view->with('data_dokumen',$data_dokumen);
                    $view->with('subjenis',$subjenis);
                    $view->with('galleri',$galleri);
                    $view->with('data_berita',$data_berita);
                    $view->with('data_agenda',$agenda_data);
                    $view->with('sosmed',$sosmed);

            }); 
        
            view()->composer('layouts.app2', 
            function($view)
                {
                    $data_dokumen = Jenis_dokumens::where('del','=',0)->get();
                    $data_berita = Jenis_beritas::where('del','=',0)->get();
                    $agenda = Agendas::where('del','=',0)->OrderBy('tanggal_selesai','DESC')->OrderBy('id','DESC')->take(5)->get();

                        $agenda_data = array();
                        foreach ($agenda as $key => $value1) {
                            $agenda_data[$key]["judul"] = $value1->judul;
                            $agenda_data[$key]["deskripsi"] = $value1->deskripsi;
                            $agenda_data[$key]["tempat"] = $value1->tempat;
                            if($value1->tanggal_mulai == $value1->tanggal_selesai){
                                $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai));
                            }else{
                                $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai))." - ".$this->hari(date('D',strtotime($value1->tanggal_selesai)))." ".date('d',strtotime($value1->tanggal_selesai))." ".$this->bulan(date('m',strtotime($value1->tanggal_selesai)))." ".date('Y',strtotime($value1->tanggal_selesai));
                            }
                            # code...
                        }

                        $gallery = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->OrderBy('id','DESC')->take('6')->get();
                        $galleri = array();
                        foreach ($gallery as $keys => $values) {
                            $values->judul = $this->limit_words($values->judul, 10);
                            $galleri[] = $values;
                        }

                    $sosmed  = Sosials::where('del','=',0)->get();
                    
                    $subjenis = Sub_jenis_dokumens::where('id','!=','1')->get();
                        $menu = Menus::where('del','=',0)->orderBy('urutan','ASC')->get();
                    foreach ($menu as $key => $value) {
                        if($value->tipe == 0){
                        if($value->from == 'jenis_beritas'){
                            $value->name = $value->jenis_berita_id->name;
                            $value->link_data = 'main/'.$value->link.'/'.$value->from_id;
                        }else if($value->from == 'custom'){
                            $value->link_data = $value->link;
                        }else{
                            $value->name = $value->jenis_dokumen_id->name;
                            $value->link_data = 'main/'.$value->link.'/'.$value->from_id;
                        }
                        }
                    
                        $sub[$value->id] = Sub_menus::where('del','=',0)->where('menu_id','=',$value->id)->get();
                            foreach ($sub[$value->id] as $keys => $values) {
                                if($values->from_id != 0){
                                    $values->link_data = 'main/'.$values->link.'/'.$values->from_id;
                                    if($value->from == 'jenis_beritas'){
                                        $values->name = $values->jenis_berita_id->name;
                                    }else{
                                        $values->name = $values->jenis_dokumen_id->name;
                                    }
                                }else{
                                    $values->name = $values->from;
                                    $values->link_data = $values->link;
                                }
                            
                        
                    }
                }

                $tgl = date('D-d-m-Y');
                $tgl = explode('-',$tgl);
                $d_hari = $this->hari($tgl[0]).' , '.$tgl[1].' '.$this->bulan($tgl[2]).' '.$tgl[3];
                // dd($d_hari);

                    $view->with('d_hari',$d_hari);
                    $view->with('menu',$menu);
                    $view->with('sub',$sub);
                    $view->with('data_dokumen',$data_dokumen);
                    $view->with('subjenis',$subjenis);
                    $view->with('galleri',$galleri);
                    $view->with('data_berita',$data_berita);
                    $view->with('data_agenda',$agenda_data);
                    $view->with('sosmed',$sosmed);

            });
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    public function register()
    {
        //
    }
}
