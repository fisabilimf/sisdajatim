<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Beritas;
use App\Jenis_beritas;
use App\Jenis_dokumens;
use App\Dokumens;
use App\Agendas;
use App\Lingkups;
use App\Komentars;
use App\Saranas;
use App\Kotak_sarans;
use DB;
use App\Profils;
use App\Galleri_datas;

use Validator;
use Input;
use Excel;
class AndroidApiController extends Controller
{
	
	public function __construct()
	{

	}
	
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

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

    public function berita(Request $request){

        $datenow = date('Y-m-d');
        $datelast = date('Y-m-d', strtotime('-1 month', strtotime($datenow)));
        $head_count = Beritas::where('del','=',0)->where('status','=','1')->where('tanggal','>=',$datelast)->count();
        if($head_count == 0){
            $head = Beritas::where('del','=',0)->where('status','=','1')->orderBy('tanggal','DESC')->take(3)->get();
            $head_count = 3;
           //  var_dump("ds");
        }
        else if($head_count > 10){
            $head_count = 10;
            $head = Beritas::where('del','=',0)->where('status','=','1')->where('tanggal','>=',$datelast)->take(10)->get();
        }
        else{
            $head = Beritas::where('del','=',0)->where('status','=','1')->where('tanggal','>=',$datelast)->get();
           // var_dump("ds1");
        }

        $headline1 = array();
        $headline = array();
            foreach ($head as $key => $value) {
                $headline1[$key] = 1;
                $headline[$key]["id"] = $value->id;
                $headline[$key]["jenis_dokumentasi"] = $value->jenis;
                $headline[$key]["jenis_id"] = $value->jenis_berita_id;
                $headline[$key]["judul"] = $value->judul;
                $headline[$key]["foto"] = $value->foto;
                $headline[$key]["penulis"] = $value->userdata->name;
                $headline[$key]["tanggal"] = $this->hari(date('D',strtotime($value->tanggal)))." ".date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $headline[$key]["jenis"] = $value->jenis_berita_data->name;
                $headline[$key]["isi"] = $this->limit_words($value->isi, 25);
                $headline[$key]["komentar_count"] = Komentars::where('berita_id','=',$value->id)->where('del','=',0)->count();

            }

        $biasa = Beritas::where('del','=',0)->where(function($query){
                        $query->where('status','=','0')->orwhere(function($query1){
                            $query1->where('status','=','1')->where('tanggal','<',date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d')))));
                        });
                    })->orderBy('tanggal','DESC')->paginate(10);

        $pagination = array(
            "total" => $biasa->total(),
            "per_page" => $biasa->perPage(),
            "current_page" => $biasa->currentPage(),
            "last_page" => $biasa->lastPage(),
            "next_page_url" => $biasa->nextPageUrl(),
            "prev_page_url" => $biasa->previousPageUrl(),
            "has_more_page" => $biasa->hasMorePages()
        );

        $berita_biasa = array();
        foreach ($biasa as $key => $value) {
                $berita_biasa[$key]["id"] = $value->id;
                $berita_biasa[$key]["jenis_dokumentasi"] = $value->jenis;
                $berita_biasa[$key]["jenis_id"] = $value->jenis_berita_id;
                $berita_biasa[$key]["judul"] = $value->judul;
                $berita_biasa[$key]["foto"] = $value->foto;
                $berita_biasa[$key]["penulis"] = $value->userdata->name;
                $berita_biasa[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $berita_biasa[$key]["jenis"] = $value->jenis_berita_data->name;
                $berita_biasa[$key]["isi"] = $this->limit_words($value->isi, 15);
                $berita_biasa[$key]["komentar_count"] = Komentars::where('berita_id','=',$value->id)->where('del','=',0)->count();
        }

        $jenis_berita = Jenis_beritas::where('del','=',0)->get();

		$message = array('message' => "Success"); 
        $status = array('status_code' => 200);
        $head_count = array('head_count' => $head_count);
        $berita_biasa = array('berita_biasa' => $berita_biasa);
        $headline = array('headline' => $headline);
        $jenis_berita = array('jenis_berita' => $jenis_berita);
		
		$array_merge = array_merge($message,$status,$head_count,$headline,$berita_biasa, $pagination,$jenis_berita);
		return response()->json($array_merge)->setStatusCode(200);
    }

     public function detail_berita(Request $request , $id){
        $value = Beritas::find($id);
                $headline = array();
                $headline["id"] = $value->id;
                $headline["jenis_dokumentasi"] = $value->jenis;
                $headline["judul"] = $value->judul;
                $headline["kutipan"] = $value->kutipan;
                $headline["foto"] = $value->foto;
                $headline["penulis"] = $value->userdata->name;
                $headline["tanggal"] = $this->hari(date('D',strtotime($value->tanggal)))." ".date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $headline["jenis"] = $value->jenis_berita_data->name;
                $headline["isi"] = $value->isi;

        $relasi = Beritas::where('jenis_berita_id','=',$value->jenis_berita_id)->where('del','=',0)->orderBy('tanggal','DESC')->take(3)->get();
                 $berita_biasa = array();
        foreach ($relasi as $key => $value) {
                $berita_biasa[$key]["id"] = $value->id;
                $berita_biasa[$key]["jenis_dokumentasi"] = $value->jenis;
                $berita_biasa[$key]["judul"] = $value->judul;
                $berita_biasa[$key]["foto"] = $value->foto;
                $berita_biasa[$key]["penulis"] = $value->userdata->name;
                $berita_biasa[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $berita_biasa[$key]["jenis"] = $value->jenis_berita_data->name;
                $berita_biasa[$key]["isi"] = $this->limit_words($value->isi, 15);

                
          
        }
        $komen = Komentars::where('del','=',0)->where('berita_id','=',$headline["id"])->orderBy('tanggal','DESC')->get();
        $komentar = array();
        $komen_count = 0;
           foreach ($komen as $key => $value) {
                $komentar[$key]["name"] = $value->name;
                $komentar[$key]["email"] = $value->email;
                $komentar[$key]["isi"] = $value->isi;
                $komentar[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
        
                $komen_count++;
          
        }

          $message = array('message' => "Success"); 
        $status = array('status_code' => 200);
        $headline = array('detail_berita' => $headline); 
        $relasi_berita = array('relasi_berita' => $berita_biasa);
        $komentar = array('komentar' => $komentar);
        $komentar_count = array('komentar_count' => $komen_count);    
        $array_merge = array_merge($message,$status,$headline,$headline,$relasi_berita, $komentar_count,$komentar);
        return response()->json($array_merge)->setStatusCode(200);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
     }

     public function get_komentar_berita(Request $request , $id){
        $berita = Beritas::find($id);
        
        $komen = Komentars::where('del','=',0)->where('berita_id','=',$berita->id)->orderBy('tanggal','DESC')->get();
        $komentar = array();
        $komen_count = 0;
           foreach ($komen as $key => $value) {
                $komentar[$key]["name"] = $value->name;
                $komentar[$key]["email"] = $value->email;
                $komentar[$key]["isi"] = $value->isi;
                $komentar[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($berita->tanggal)))." ".date('Y',strtotime($berita->tanggal));
        
                $komen_count++;
          
        }

        $message = array('message' => "Success"); 
        $status = array('status_code' => 200);
        $komentar = array('komentar' => $komentar);
        $komentar_count = array('komentar_count' => $komen_count);
        $array_merge = array_merge($message,$status,$komentar_count,$komentar);
        return response()->json($array_merge)->setStatusCode(200);  

     }

     public function komentar_store(Request $request){
      $forms = Request::all();
       $forms['tanggal'] = date('Y-m-d');
       Komentars::create($forms);
        $message = array('message' => "Success Menambahkan Komentar"); 
        $status = array('status_code' => 200);
      $array_merge = array_merge($message,$status);
      return response()->json($array_merge)->setStatusCode(200);
     }

   

    public function agenda(Request $request){
        $datenow = date('Y-m-d');
        $head_count = Beritas::where('del','=',0)->where('jenis_berita_id','=','5')->where('tanggal','>=',$datenow)->count();
        $head = Beritas::where('del','=',0)->where('jenis_berita_id','=','5')->where('tanggal','>=',$datenow)->get();
        $headline = array();
        foreach ($head as $key => $value) {
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D',strtotime($value->tanggal)))." ".date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 25);
        }

        $agenda =Agendas::where('del','=',0)->orderBy('tanggal_mulai','DESC')->paginate(9);
        $agenda_count =Agendas::where('del','=',0)->where('tanggal_mulai','>=',$datenow)->count();
        $agenda_data = array();
        foreach ($agenda as $key => $value1) {
            $agenda_data[$key]["judul"] = $value1->judul;
            $agenda_data[$key]["deskripsi"] = $value1->deskripsi;
            $agenda_data[$key]["tempat"] = $value1->tempat;
            if($value1->tanggal_mulai == $value1->tanggal_selesai){
                $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai));
            }else{
                    $agenda_data[$key]["tanggal"] = $this->hari(date('D',strtotime($value1->tanggal_mulai)))." ".date('d',strtotime($value1->tanggal_mulai))." ".$this->bulan(date('m',strtotime($value1->tanggal_mulai)))." ".date('Y',strtotime($value1->tanggal_mulai))." Sampai ".$this->hari(date('D',strtotime($value1->tanggal_selesai)))." ".date('d',strtotime($value1->tanggal_selesai))." ".$this->bulan(date('m',strtotime($value1->tanggal_selesai)))." ".date('Y',strtotime($value1->tanggal_selesai));
            }
            # code...
        }

        $message = array('message' => "Success"); 
        $status = array('status_code' => 200);
        $event_headline = array('event_headline' => $headline);
        $event_headline_count = array('event_headline_count' => $head_count);
        $agenda_data = array('agenda_data' => $agenda_data);
        $agenda_count = array('agenda_count' => $agenda_count);
        $pagination = array(
            "total" => $agenda->total(),
            "per_page" => $agenda->perPage(),
            "current_page" => $agenda->currentPage(),
            "last_page" => $agenda->lastPage(),
            "next_page_url" => $agenda->nextPageUrl(),
            "prev_page_url" => $agenda->previousPageUrl(),
            "has_more_page" => $agenda->hasMorePages()
        );
        $array_merge = array_merge($message,$status,$event_headline,$event_headline_count,$agenda_data,$agenda_count,$pagination);
        return response()->json($array_merge)->setStatusCode(200);

     }
      public function berita_search(Request $request){
          
        $forms = Request::all();
        // var_dump($forms['cari_berita']);
        // exit();
          $head = Beritas::where('del','=',0)->where(function($query){
                                                                 $forms = Request::all();
                                                                 $query->where('judul','like','%'.$forms['cari_berita'].'%')
                                                                 ->orwhere('isi','like','%'.$forms['cari_berita'].'%');
                                                                 })->orderBy('tanggal','DESC')->paginate(10);
          $berita_biasa = array();
        foreach ($head as $key => $value) {
                $berita_biasa[$key]["id"] = $value->id;
                $berita_biasa[$key]["jenis_id"] = $value->jenis_berita_id;
                $berita_biasa[$key]["judul"] = $value->judul;
                $berita_biasa[$key]["foto"] = $value->foto;
                $berita_biasa[$key]["jenis_dokumentasi"] = $value->jenis;
                $berita_biasa[$key]["penulis"] = $value->userdata->name;
                $berita_biasa[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $berita_biasa[$key]["jenis"] = $value->jenis_berita_data->name;
                $berita_biasa[$key]["isi"] = $this->limit_words($value->isi, 15);
                $berita_biasa[$key]["komentar_count"] = Komentars::where('berita_id','=',$value->id)->where('del','=',0)->count();
        }

         $pagination = array(
            "total" => $head->total(),
            "per_page" => $head->perPage(),
            "current_page" => $head->currentPage(),
            "last_page" => $head->lastPage(),
            "next_page_url" => $head->nextPageUrl(),
            "prev_page_url" => $head->previousPageUrl(),
            "has_more_page" => $head->hasMorePages()
        );

          $message = array('message' => "Success"); 
        $status = array('status_code' => 200);

        $berita_biasa = array('berita_biasa' => $berita_biasa);
   
        $array_merge = array_merge($message,$status,$berita_biasa, $pagination);
    return response()->json($array_merge)->setStatusCode(200); 


      }

         public function berita_jenis(Request $request,$id){
          
     
        // var_dump($forms['cari_berita']);
        // exit();
          $head = Beritas::where('del','=',0)->where('jenis_berita_id','=',$id)->paginate(10);
          $berita_biasa = array();
        foreach ($head as $key => $value) {
                $berita_biasa[$key]["id"] = $value->id;
                $berita_biasa[$key]["jenis_id"] = $value->jenis_berita_id;
                $berita_biasa[$key]["judul"] = $value->judul;
                $berita_biasa[$key]["foto"] = $value->foto;
                $berita_biasa[$key]["jenis_dokumentasi"] = $value->jenis;
                $berita_biasa[$key]["penulis"] = $value->userdata->name;
                $berita_biasa[$key]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
                $berita_biasa[$key]["jenis"] = $value->jenis_berita_data->name;
                $berita_biasa[$key]["isi"] = $this->limit_words($value->isi, 15);
                $berita_biasa[$key]["komentar_count"] = Komentars::where('berita_id','=',$value->id)->where('del','=',0)->count();
        }

         $pagination = array(
            "total" => $head->total(),
            "per_page" => $head->perPage(),
            "current_page" => $head->currentPage(),
            "last_page" => $head->lastPage(),
            "next_page_url" => $head->nextPageUrl(),
            "prev_page_url" => $head->previousPageUrl(),
            "has_more_page" => $head->hasMorePages()
        );

          $message = array('message' => "Success"); 
        $status = array('status_code' => 200);

        $berita_biasa = array('berita_biasa' => $berita_biasa);
   
        $array_merge = array_merge($message,$status,$berita_biasa, $pagination);
    return response()->json($array_merge)->setStatusCode(200); 


      }
}