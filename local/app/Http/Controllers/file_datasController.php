<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\file_datas;

use DB;

use Validator;
use Input;
use Excel;

class file_datasController extends Controller
{
    //

     private function __GenerateRandomName($length = 10) {
            $validCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefdhijklmnopqrstuvwxyz";
            $validCharNumber = strlen($validCharacters);
            $result = "";

            for ($iStr = 0; $iStr < $length; $iStr++) {
                $index = mt_rand(0, $validCharNumber - 1);
                $result .= $validCharacters[$index];
            }

            return $result;
        }

         public function show($id)
        {
            
            // $rr = file_datas::all();
          
            // $i = 1;
            // foreach($rr as $r){
              
            //     if(strpos($r->name, 'DAS') !== false){
            //           $s = file_datas::create([
            //               'name'=>'Tampungan Air',
            //               'tipe'=>'1',
            //               'parent_id'=>$r->id]);
                          
            //               file_datas::create([
            //               'name'=>'Perencanaan',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
            //               file_datas::create([
            //               'name'=>'Fisik',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
            //               file_datas::create([
            //               'name'=>'Pengawasan',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
            //               file_datas::create([
            //               'name'=>'Notulen',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
            //               file_datas::create([
            //               'name'=>'Paparan',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
            //               file_datas::create([
            //               'name'=>'Umum',
            //               'tipe'=>'1',
            //               'parent_id'=>$s->id]);
                        
            //         }
            // }
            
          
            
            if($id != 0){
                $find = file_datas::find($id);
                $name = $find->name;
            }else{
                $name = 'Bank Dokumen';
                $find = array();
            }
            $data = file_datas::where('del','=',0)->where('parent_id','=',$id)->orderBy('tipe','DESC')->get();
            return view('file_datas.index',compact('data','id','name','find'));
        }
        
         public function create($id,$tipe)
        {
           if($id != 0){
                $find = file_datas::find($id);
                $name = $find->name;
            }else{
                $name = 'Bank Dokumen';
            }
            return view('file_datas.create',compact('id','name','tipe'));
        }
        
        public function edit($id)
        {
            
            $find = file_datas::find($id);
           if($find->parent_id != 0){
                $name = $find->name;
            }else{
                $name = 'Bank Dokumen';
            }
            return view('file_datas.edit',compact('id','name','find'));
        }
        
         public function store(Request $request)
        {
           $forms=Request::all();
           if($forms['tipe'] == 0){
               if(Request::hasFile('file')) {
                        $file = Input::file('file');
                        $forms['file'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                       $file->move("asset/bank_dokumen",$forms['file']);
    
                }else{
                    \Session::flash('alert', 'alert-danger');
                 \Session::flash('message', 'File Tidak Ada, Data Tidak Lengkap');
                   return redirect('file_datas/create/'.$forms['parent_id'].'/'.$forms['tipe']); 
                }
           }
           \Session::flash('alert', 'alert-success');
                 \Session::flash('message', 'Data Anda Berhasil Disimpan');
           file_datas::create($forms);
            return redirect('file_datas/'.$forms['parent_id']);
          }
          
    public function update(Request $request, $id)
    {
        $forms = Request::all();
        $find = file_datas::find($id);
        
        if($forms['tipe'] == '0'){
            if(Request::hasFile('file')) {
                        $file = Input::file('file');
                        $forms['file'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                       $file->move("asset/bank_dokumen",$forms['file']);
    
                }
                $find->update($forms);
        }else{
            $find->update($forms);
        }
        \Session::flash('alert', 'alert-success');
                 \Session::flash('message', 'Data Anda Berhasil Disimpan');
            return redirect('file_datas/'.$find->parent_id);
    }
   

      public function destroy($id)
    {
        $find = file_datas::find($id);
    	   DB::table('file_datas')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            \Session::flash('alert', 'alert-success');
                 \Session::flash('message', 'Data Anda Berhasil Dihapus');
            return redirect('file_datas/'.$find->parent_id);
    }
}
