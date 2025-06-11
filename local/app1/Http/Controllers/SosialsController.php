<?php

namespace App\Http\Controllers;

use Request;
use Requestone;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Users;
use App\Sosials;
use DB;

use Validator;
use Input;
use Excel;

class SosialsController extends Controller
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
    	$data = Sosials::where('del','=',0)->get();
    	 // var_dump($data);
      //  exit();
    	return view('sosials.index',compact('data'));
    }
      public function create()
    {
    	return view('sosials.create');
    }
       public function store(Request $request)
    {
       $forms=Request::all();
       if(Request::hasFile('icon')) {
                                  $file = Input::file('icon');
                                    $forms['icon'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/sosial",$forms['icon']);

                            }
       Sosials::create($forms);
        return redirect('sosials');
       // var_dump($forms);
       // exit();

      }

         public function edit($id)
    {
    	$jb =Sosials::find($id);
    	return view('sosials.edit',compact('jb'));
    }

      public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Sosials::find($id);
   $user->update($usUpdate);
   return redirect('sosials');
    }

     public function destroy($id)
    {
    	   DB::table('sosials')
            ->where('id','=', $id)
            ->update(['del' => 1 ]);
            return redirect('sosials');
    }
}
