<?php

namespace App\Http\Controllers;

use Request;
use Requestone;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Dokumens;
use App\Jenis_dokumens;
use DB;
use App\Sub_jenis_dokumens;

use Validator;

use Excel;

class DokumensController extends Controller
{
    //
     private function __GenerateRandomName($length = 5) {
            $validCharacters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefdhijklmnopqrstuvwxyz";
            $validCharNumber = strlen($validCharacters);
            $result = "";

            for ($iStr = 0; $iStr < $length; $iStr++) {
                $index = mt_rand(0, $validCharNumber - 1);
                $result .= $validCharacters[$index];
            }

            return $result;
        }

         public function index()
    {
    	$data = Dokumens::where('del','=',0)->orderBy('jenis_dokumen_id','ASC')->get();
    	return view('dokumens.index',compact('data'));
    }
     public function create()
    {
        $subjenis = Sub_jenis_dokumens::where('del','=','0')->lists('name','id');
    	$jenis = Jenis_dokumens::where('del','=',0)->lists('name','id');
    	return view('dokumens.create',compact('jenis','subjenis'));
    }
      public function store(Request $request)
    {
    	$forms=Request::all();
    	$forms['user_by'] = Auth::User()->id;
    	
    	if($forms['ra1'] == "1"){
    		 $forms['file'] = "-";
    		   Dokumens::create($forms);
    	}else{
    	if(Request::hasFile('file_dokumen')) {
                                  $file = Input::file('file_dokumen');
                                    $forms['file'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                     $forms['link'] = "-";
                                      Dokumens::create($forms);
                                    $file->move("asset/dokumen",$forms['file']);

                            }
        
        }
      
        return redirect('dokumens');

    }
      public function destroy($id)
    {
    	   DB::table('dokumens')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('dokumens');
    }
}
