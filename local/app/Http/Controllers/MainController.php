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
use App\Links;
use DB;
use App\Profils;
use App\Sosials;
use App\Galleri_datas;
use App\Sub_jenis_dokumens;
use Validator;
use Input;
use Excel;
use App\Menus;
use App\Sub_menus;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    function hari($hari)
    {

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

    function bulan($bul)
    {

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

    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }

    public function tkpsda()
    {

        return view('main.tkpsda');
    }
    public function komir()
    {

        return view('main.komir');
    }
    public function dewan()
    {

        return view('main.dewan');
    }

    public function search_store(Request $request)
    {
        $data = Request::all();
        $cari = $data['cari'];
        $berita = Beritas::where('del', '=', 0)->where('judul', 'like', '%' . $cari . '%')->OrderBy('tanggal', 'DESC')->get();
        $dokumen = Dokumens::where('del', '=', 0)->where('judul', 'like', '%' . $cari . '%')->OrderBy('created_at', 'DESC')->get();
        $dokumen_count = Dokumens::where('del', '=', 0)->where('judul', 'like', '%' . $cari . '%')->OrderBy('created_at', 'DESC')->count();

        $headline = array();
        foreach ($berita as $key => $value) {
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 75);
            $headline[$key]["komentar"] = Komentars::where('del', '=', 0)->where('berita_id', '=', $value->id)->count();
        }

        $subjenis = Sub_jenis_dokumens::where('id', '!=', '1')->get();



        return view('main.search', compact('headline', 'dokumen', 'dokumen_count', 'subjenis'));
    }

    public function berita_detail($data)
    {
        $detail = Jenis_beritas::find($data);
        $head_data = Beritas::where('del', '=', 0)->where('jenis_berita_id', '=', $data)->orderBy('tanggal', 'DESC')->orderBy('id', 'DESC')->paginate(6);
        $headline = array();
        foreach ($head_data as $key => $value) {
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 75);
            $headline[$key]["komentar"] = Komentars::where('del', '=', 0)->where('berita_id', '=', $value->id)->count();
        }
        return view('main.berita_detail', compact('data', 'headline', 'head_data', 'detail'));
    }
    public function prasarana($data)
    {
        $data_dokumen = Jenis_dokumens::where('del', '=', 0)->get();
        $data_berita = Jenis_beritas::where('del', '=', 0)->get();
        $menu = Menus::where('del', '=', 0)->orderBy('urutan', 'ASC')->get();
        foreach ($menu as $key => $value) {
            if ($value->tipe == 0) {
                if ($value->from == 'jenis_beritas') {
                    $value->name = $value->jenis_berita_id->name;
                    $value->link_data = 'main/' . $value->link . '/' . $value->from_id;
                } else if ($value->from == 'custom') {
                    $value->link_data = $value->link;
                } else {
                    $value->name = $value->jenis_dokumen_id->name;
                    $value->link_data = 'main/' . $value->link . '/' . $value->from_id;
                }
            }

            $sub[$value->id] = Sub_menus::where('del', '=', 0)->where('menu_id', '=', $value->id)->get();
            foreach ($sub[$value->id] as $keys => $values) {
                if ($values->from_id != 0) {
                    $values->link_data = 'main/' . $values->link . '/' . $values->from_id;
                    if ($value->from == 'jenis_beritas') {
                        $values->name = $values->jenis_berita_id->name;
                    } else {
                        $values->name = $values->jenis_dokumen_id->name;
                    }
                } else {
                    $values->name = $values->from;
                    $values->link_data = $values->link;
                }
            }
        }
        $sosmed  = Sosials::where('del', '=', 0)->get();
        if ($data == 0) {
            $data = Saranas::where('del', '=', 0)->get();
        } else if ($data == 1) {
            $data = Saranas::where('del', '=', 0)->where('lingkup_id', '!=', 5)->get();
        } else if ($data == 2) {
            $data = Saranas::where('del', '=', 0)->where('lingkup_id', '=', 5)->get();
        }

        return view('main.prasarana', compact('menu', 'data', 'sub', 'sosmed', 'data_berita', 'data_dokumen'));
    }

    public function agenda()
    {
        $datenow = date('Y-m-d');
        $head_count = Beritas::where('del', '=', 0)->where('jenis_berita_id', '=', '5')->where('tanggal', '>=', $datenow)->count();
        $head = Beritas::where('del', '=', 0)->where('jenis_berita_id', '=', '5')->where('tanggal', '>=', $datenow)->get();

        $headline = array();
        foreach ($head as $key => $value) {
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 25);
        }
        $agenda = Agendas::where('del', '=', 0)->orderBy('tanggal_mulai', 'DESC')->get();
        $agenda_count = Agendas::where('del', '=', 0)->where('tanggal_mulai', '>=', $datenow)->count();
        $agenda_data = array();
        foreach ($agenda as $key => $value1) {
            $agenda_data[$key]["judul"] = $value1->judul;
            $agenda_data[$key]["deskripsi"] = $value1->deskripsi;
            $agenda_data[$key]["tempat"] = $value1->tempat;
            if ($value1->tanggal_mulai == $value1->tanggal_selesai) {
                $agenda_data[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai));
            } else {
                $agenda_data[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai)) . " Sampai " . $this->hari(date('D', strtotime($value1->tanggal_selesai))) . " " . date('d', strtotime($value1->tanggal_selesai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_selesai))) . " " . date('Y', strtotime($value1->tanggal_selesai));
            }
            # code...
        }
        return view('main.agenda', compact('head_count', 'headline', 'agenda_data', 'agenda_count'));
    }
    public function main()
    {
        return view('home.main');
    }
    public function index2()
    {
        $gallery = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->OrderBy('id', 'DESC')->take('6')->get();
        $galleri = array();
        foreach ($gallery as $keys => $values) {
            $values->judul = $this->limit_words($values->judul, 7);
            $galleri[] = $values;
        }
        $datenow = date('Y-m-d');
        $datelast = date('Y-m-d', strtotime('-1 month', strtotime($datenow)));
        $head_count = Beritas::where('del', '=', 0)->where('status', '=', '1')->where('tanggal', '>=', $datelast)->count();
        if ($head_count < 4) {
            $head = Beritas::where('del', '=', 0)->orderBy('status', 'DESC')->orderBy('tanggal', 'DESC')->take(5)->get();
            // $head_count = 4;
            //  var_dump("ds");
        } else {
            $head = Beritas::where('del', '=', 0)->where('status', '=', '1')->orderBy('tanggal', 'DESC')->take(5)->get();
            // var_dump("ds1");
        }

        $headline1 = array();
        $headline = array();
        foreach ($head as $key => $value) {
            $headline1[$key] = 1;
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 25);
        }

        // $biasa = Beritas::where('del','=',0)->where(function($query){
        //                                                     $query->where('status','=','0')->orwhere(function($query1){

        //                                                         $query1->where('status','=','1')->where('tanggal','<',date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d')))));
        //                                                     });
        //                                                                 })->orderBy('tanggal','DESC')->paginate(9);
        $jenis_berita = array();
        $jenis = Jenis_beritas::where('del', '=', 0)->orderBy('id', 'ASC')->get();
        foreach ($jenis as $keys => $values) {
            $biasa = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->where('jenis_berita_id', '=', $values->id)->take(5)->get();
            $biasa_count = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->where('jenis_berita_id', '=', $values->id)->count();
            $berita_biasa[$values->id] = array();
            foreach ($biasa as $key => $value) {
                $berita_biasa[$values->id][$value->id]["id"] = $value->id;
                $berita_biasa[$values->id][$value->id]["judul"] = $value->judul;
                $berita_biasa[$values->id][$value->id]["jenis_dokumentasi"] = $value->jenis;
                $berita_biasa[$values->id][$value->id]["foto"] = $value->foto;
                $berita_biasa[$values->id][$value->id]["penulis"] = $value->userdata->name;
                $berita_biasa[$values->id][$value->id]["tanggal"] = date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
                $berita_biasa[$values->id][$value->id]["jenis"] = $value->jenis_berita_data->name;
                $berita_biasa[$values->id][$value->id]["isi"] = $this->limit_words($value->isi, 15);
            }
            if ($biasa_count > 0) {
                //$values->count = 
                $jenis_berita[] = $values;
            }
        }

        $agenda = Agendas::where('del', '=', 0)->OrderBy('tanggal_selesai', 'DESC')->OrderBy('id', 'DESC')->take(5)->get();

        $data_agenda = array();
        foreach ($agenda as $key => $value1) {
            $data_agenda[$key]["judul"] = $value1->judul;
            $data_agenda[$key]["deskripsi"] = $value1->deskripsi;
            $data_agenda[$key]["tempat"] = $value1->tempat;
            if ($value1->tanggal_mulai == $value1->tanggal_selesai) {
                $data_agenda[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai));
            } else {
                $data_agenda[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai)) . " - " . $this->hari(date('D', strtotime($value1->tanggal_selesai))) . " " . date('d', strtotime($value1->tanggal_selesai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_selesai))) . " " . date('Y', strtotime($value1->tanggal_selesai));
            }
            # code...
        }


        // echo "<pre>";
        // var_dump($berita_biasa);
        // exit();
        return view('main.index', compact('headline', 'berita_biasa', 'jenis_berita', 'galleri', 'data_agenda'));
    }

    public function index()
    {
        $gallery = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->OrderBy('id', 'DESC')->take('6')->get();
        $galleri = array();
        foreach ($gallery as $keys => $values) {
            $values->judul = $this->limit_words($values->judul, 7);
            $galleri[] = $values;
        }
        $datenow = date('Y-m-d');
        $datelast = date('Y-m-d', strtotime('-1 month', strtotime($datenow)));
        $head_count = Beritas::where('del', '=', 0)->where('status', '=', '1')->where('tanggal', '>=', $datelast)->count();
        if ($head_count < 4) {
            $head = Beritas::where('del', '=', 0)->orderBy('status', 'DESC')->orderBy('tanggal', 'DESC')->take(5)->get();
            // $head_count = 4;
            //  var_dump("ds");
        } else {
            $head = Beritas::where('del', '=', 0)->where('status', '=', '1')->orderBy('tanggal', 'DESC')->take(5)->get();
            // var_dump("ds1");
        }

        $headline1 = array();
        $headline = array();
        foreach ($head as $key => $value) {
            $headline1[$key] = 1;
            $headline[$key]["id"] = $value->id;
            $headline[$key]["judul"] = $value->judul;
            $headline[$key]["jenis_dokumentasi"] = $value->jenis;
            $headline[$key]["foto"] = $value->foto;
            $headline[$key]["penulis"] = $value->userdata->name;
            $headline[$key]["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $headline[$key]["jenis"] = $value->jenis_berita_data->name;
            $headline[$key]["isi"] = $this->limit_words($value->isi, 25);
        }

        // $biasa = Beritas::where('del','=',0)->where(function($query){
        //                                                     $query->where('status','=','0')->orwhere(function($query1){

        //                                                         $query1->where('status','=','1')->where('tanggal','<',date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d')))));
        //                                                     });
        //                                                                 })->orderBy('tanggal','DESC')->paginate(9);
        $jenis_berita = array();
        $jenis = Jenis_beritas::where('del', '=', 0)->orderBy('id', 'ASC')->get();

        $dat = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->take(9);
        $beritaku = $dat->get();

        $no = 1;
        $berita_biasa = array();
        foreach ($beritaku as $k => $value) {
            $berita_biasa[$no]["jenis_berita_id"] = $value->jenis_berita_id;
            $berita_biasa[$no]["id"] = $value->id;
            $berita_biasa[$no]["judul"] = $value->judul;
            $berita_biasa[$no]["jenis_dokumentasi"] = $value->jenis;
            $berita_biasa[$no]["foto"] = $value->foto;
            $berita_biasa[$no]["penulis"] = $value->userdata->name;
            $berita_biasa[$no]["tanggal"] = date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $berita_biasa[$no]["jenis"] = $value->jenis_berita_data->name;
            $berita_biasa[$no]["isi"] = $this->limit_words($value->isi, 15);
            $no++;
        }


        foreach ($jenis as $jj => $j) {
            $no = 0;
            foreach ($berita_biasa as $bb => $d) {
                if ($j->name == $d['jenis']) {
                    $no++;
                }
            }
            if ($no > 0) {
                $jenis_berita[] = $j;
            }
        }


        // foreach($jenis as $keys => $values){
        //     $biasa = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->where('jenis_berita_id','=',$values->id)->take(5)->get();
        //     $biasa_count = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->where('jenis_berita_id','=',$values->id)->count();
        //     dd($biasa);

        // }

        // foreach ($jenis as $keys => $values) {
        // $biasa = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->where('jenis_berita_id','=',$values->id)->take(5)->get();
        // $biasa_count = Beritas::where('del','=',0)->orderBy('tanggal','DESC')->where('jenis_berita_id','=',$values->id)->count();
        // $berita_biasa[$values->id] = array();
        // foreach ($biasa as $key => $value) {
        //         $berita_biasa[$values->id][$value->id]["id"] = $value->id;
        //         $berita_biasa[$values->id][$value->id]["judul"] = $value->judul;
        //         $berita_biasa[$values->id][$value->id]["jenis_dokumentasi"] = $value->jenis;
        //         $berita_biasa[$values->id][$value->id]["foto"] = $value->foto;
        //         $berita_biasa[$values->id][$value->id]["penulis"] = $value->userdata->name;
        //         $berita_biasa[$values->id][$value->id]["tanggal"] = date('d',strtotime($value->tanggal))." ".$this->bulan(date('m',strtotime($value->tanggal)))." ".date('Y',strtotime($value->tanggal));
        //         $berita_biasa[$values->id][$value->id]["jenis"] = $value->jenis_berita_data->name;
        //         $berita_biasa[$values->id][$value->id]["isi"] = $this->limit_words($value->isi, 15);


        // }
        // if($biasa_count > 0){
        //     //$values->count = 
        //     $jenis_berita[] = $values;
        // }
        // }

        $agenda = Agendas::where('del', '=', 0)->OrderBy('tanggal_selesai', 'DESC')->OrderBy('id', 'DESC')->take(5)->get();

        $data_agenda = array();
        foreach ($agenda as $key => $value1) {
            $data_agenda[$key]["judul"] = $value1->judul;
            $data_agenda[$key]["deskripsi"] = $value1->deskripsi;
            $data_agenda[$key]["tempat"] = $value1->tempat;
            if ($value1->tanggal_mulai == $value1->tanggal_selesai) {
                $data_agenda[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai));
            } else {
                $data_agenda[$key]["tanggal"] = $this->hari(date('D', strtotime($value1->tanggal_mulai))) . " " . date('d', strtotime($value1->tanggal_mulai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_mulai))) . " " . date('Y', strtotime($value1->tanggal_mulai)) . " - " . $this->hari(date('D', strtotime($value1->tanggal_selesai))) . " " . date('d', strtotime($value1->tanggal_selesai)) . " " . $this->bulan(date('m', strtotime($value1->tanggal_selesai))) . " " . date('Y', strtotime($value1->tanggal_selesai));
            }
            # code...
        }


        // echo "<pre>";
        // var_dump($berita_biasa);
        // exit();
        return view('main.index2', compact('headline', 'berita_biasa', 'jenis_berita', 'galleri', 'data_agenda'));
    }
    public function link()
    {

        $data = Links::where('del', '=', 0)->get();
        return view('main.link', compact('data'));
    }
    public function timeline()
    {
        return view('main.timeline');
    }

    public function excel($jenis)
    {

        // $datasaya = DB::connection('mysql1')->table('embungwaduks')->get(); 
        // echo"<pre>";
        // var_dump($datasaya);
        // exit();
        Excel::create('SISDA Excel Report', function ($excel) use ($jenis) {
            $excel->sheet('SISDA', function ($sheet) use ($jenis) {

                $i = 1;
                if ($jenis == "all") {
                    $datasaya = DB::connection('mysql1')->table('embungwaduks')->join('dats', 'embungwaduks.data', '=', 'dats.id')->get();
                } else {
                    $datasaya = DB::connection('mysql1')->table('embungwaduks')->join('dats', 'embungwaduks.data', '=', 'dats.id')->where('embungwaduks.data', '=', $jenis)->get();
                }


                foreach ($datasaya as $key => $value) {

                    $data = array(
                        $i,
                        $value->nama,
                        $value->upt,
                        $value->nama_embung,
                        $value->lat,
                        $value->longi,
                        $value->deskel,
                        $value->kecamatan,
                        $value->kabupaten,
                        $value->letak,
                        $value->luas

                    );
                    $sheet->prependRow($i, $data);
                    $i++;
                }

                $headings = array(
                    'No',
                    'Jenis',
                    'UPT',
                    'Nama',
                    'Lattitude',
                    'Longitude',
                    'Desa/Kelurahan',
                    'Kecamatan',

                    'kabupaten',
                    'Letak',
                    'Luas'
                );
                $sheet->prependRow(1, $headings);
            });
        })->export('xls');
    }
    public function dokumen($id)
    {
        $jenis = Jenis_dokumens::find($id);
        $subjenis = Sub_jenis_dokumens::where('id', '!=', '1')->get();
        $dokumen = Dokumens::where('del', '=', 0)->where('jenis_dokumen_id', '=', $id)->get();
        $dokumen_count = Dokumens::where('del', '=', 0)->where('jenis_dokumen_id', '=', $id)->count();
        // echo "<pre>";
        // var_dump($dokumen);
        // exit();
        return view('main.dokumen', compact('dokumen', 'jenis', 'dokumen_count', 'subjenis'));
    }
    public function saran_store(Request $request)
    {
        $forms = Request::all();
        $forms['tanggal'] = date('Y-m-d');
        $validate = array(
            'email' => 'required',
            'isi' => 'required',
            'captcha' => 'required|captcha'

        );
        $validator = Validator::make(Request::all(), $validate);

        if ($validator->fails()) {
            \Session::flash('alert', 'alert-danger');
            \Session::flash('message', 'Gagal Data Belum Lengkap');
            return redirect('/');
        } else {
            \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Komentar Baru Disimpan');
            Kotak_sarans::create($forms);
            return redirect('/');
        }
    }
    public function profil()
    {
        $profil = Profils::find(1);
        $struktur = Profils::find(2);


        $lingkup = Lingkups::where('del', '=', 0)->where('id', '!=', 5)->orderBy('id', 'ASC')->get();
        $sarana = Saranas::where('del', '=', 0)->where('lingkup_id', '!=', 5)->orderBy('lingkup_id', 'ASC')->get();


        return view('main.struktur', compact('profil', 'struktur', 'lingkup', 'sarana'));
    }

    public function visi_misi()
    {
        $profil = Profils::find(1);
        $struktur = Profils::find(2);


        $lingkup = Lingkups::where('del', '=', 0)->where('id', '!=', 5)->orderBy('id', 'ASC')->get();
        $sarana = Saranas::where('del', '=', 0)->where('lingkup_id', '!=', 5)->orderBy('lingkup_id', 'ASC')->get();


        return view('main.struktur', compact('profil', 'struktur', 'lingkup', 'sarana'));
    }

    public function galleri()
    {

        $gallery = Galleri_datas::where('del', '=', 0)->orderBy('id', 'DESC')->get();
        $berita = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->get();
        $data_galleri = array();

        foreach ($berita as $key => $value) {
            $data_galleri[$key]["judul"] = $value->judul;
            $data_galleri[$key]["foto"] = $value->foto;
        }
        foreach ($gallery as $key => $value) {
            $data_galleri[$key]["judul"] = $value->judul;
            $data_galleri[$key]["foto"] = $value->foto;
        }
        return view('main.galleri', compact('data_galleri'));
    }
    public function detail($id)
    {
        $value = Beritas::find($id);
        $jenis_berita = Jenis_beritas::where('del', '=', 0)->get();
        foreach ($jenis_berita as $key => $val) {
            $val->total = Beritas::where('del', '=', 0)->where('jenis_berita_id', '=', $val->id)->count();
        }
        $headline = array();
        $headline["id"] = $value->id;
        $headline["judul"] = $value->judul;
        $headline["kutipan"] = $value->kutipan;
        $headline["foto"] = $value->foto;
        $headline["jenis_dokumentasi"] = $value->jenis;
        $headline["penulis"] = $value->userdata->name;
        $headline["tanggal"] = $this->hari(date('D', strtotime($value->tanggal))) . " " . date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
        $headline["jenis"] = $value->jenis_berita_data->name;
        $headline["isi"] = $value->isi;

        $relasi = Beritas::where('jenis_berita_id', '=', $value->jenis_berita_id)->where('del', '=', 0)->orderBy('tanggal', 'DESC')->take(3)->get();
        $berita_biasa = array();
        foreach ($relasi as $key => $value) {
            $berita_biasa[$key]["id"] = $value->id;
            $berita_biasa[$key]["judul"] = $value->judul;
            $berita_biasa[$key]["foto"] = $value->foto;
            $berita_biasa[$key]["penulis"] = $value->userdata->name;
            $berita_biasa[$key]["jenis_dokumentasi"] = $value->jenis;
            $berita_biasa[$key]["tanggal"] = date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));
            $berita_biasa[$key]["jenis"] = $value->jenis_berita_data->name;
            $berita_biasa[$key]["isi"] = $this->limit_words($value->isi, 15);
        }
        $relasi_baru = Beritas::where('del', '=', 0)->orderBy('tanggal', 'DESC')->take(2)->get();
        $berita_baru = array();
        $i = 0;
        foreach ($relasi_baru as $key => $value) {
            $berita_baru[$i]["id"] = $value->id;
            $berita_baru[$i]["judul"] = $value->judul;
            $i++;
        }

        $komen = Komentars::where('del', '=', 0)->where('berita_id', '=', $headline["id"])->orderBy('tanggal', 'DESC')->get();
        $komentar = array();
        $komen_count = 0;
        foreach ($komen as $key => $value) {
            $komentar[$key]["name"] = $value->name;
            $komentar[$key]["email"] = $value->email;
            $komentar[$key]["isi"] = $value->isi;
            $komentar[$key]["tanggal"] = date('d', strtotime($value->tanggal)) . " " . $this->bulan(date('m', strtotime($value->tanggal))) . " " . date('Y', strtotime($value->tanggal));

            $komen_count++;
        }

        return view('main.detail', compact("headline", 'berita_biasa', 'berita_baru', 'komentar', 'komen_count', 'jenis_berita'));
    }
    public function komentar_store(Request $request)
    {
        $forms = Request::all();
        // var_dump($forms);
        // exit();
        $forms['tanggal'] = date('Y-m-d');
        // if(!strpos($forms['isi'],'http')){
        //      Komentars::create($forms);
        // }

        return redirect('main/detail/' . $forms["berita_id"]);
    }

    public function bidang()
    {

        return view('main.bidang');
    }

    /*public function show()
    {
        return view('popup');
    }*/
}
