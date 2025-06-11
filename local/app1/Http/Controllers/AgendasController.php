<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Agendas;

use DB;

use Validator;
use Input;
use Excel;

class AgendasController extends Controller
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

         public function index()
    {
    	$data = Agendas::where('del','=',0)->orderBy('tanggal_mulai','DESC')->get();
    	return view('agendas.index',compact('data'));
    }
      public function create()
    {
    
    	return view('agendas.create');
    }
     public function store(Request $request)
    {
       $forms=Request::all();
       $forms['tanggal_mulai'] = date('Y-m-d',strtotime($forms['tanggal_mulai']));
       $forms['tanggal_selesai'] = date('Y-m-d',strtotime($forms['tanggal_selesai']));
       $forms['user_by'] = Auth::User()->id;
       Agendas::create($forms);
        return redirect('agendas');
       // var_dump($forms);
       // exit();

      }
         public function edit($id)
    {
    	
    	$agenda =Agendas::find($id);
    	return view('agendas.edit',compact('agenda'));
    }

     public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
       $usUpdate['tanggal_mulai'] = date('Y-m-d',strtotime($usUpdate['tanggal_mulai']));
       $usUpdate['tanggal_selesai'] = date('Y-m-d',strtotime($usUpdate['tanggal_selesai']));
         $user=Agendas::find($id);
   $user->update($usUpdate);
   return redirect('agendas');
    }

      public function destroy($id)
    {
    	   DB::table('agendas')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('agendas');
    }
}
