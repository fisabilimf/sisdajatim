<?php

namespace App\Http\Controllers;

use Request;
use Requestone;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Profils;
use Input;
use DB;


class UsersController extends Controller
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
        //
      
        $user = Users::where('del','=',0)->get();
        return view('users/index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

          $forms=Request::all();
  
         $validate = array(
              'name' => 'required',
              'email' => 'required',
              'password' => 'required',

              'password_confirmation' => 'required',
             );
              $validator = Validator::make(Request::all(), $validate);

              if ($validator->fails())
                  {
               
                     \Session::flash('alert', 'alert-danger');
                            \Session::flash('message', 'Gagal Data Belum Lengkap');
                               return redirect('users/create');
                  }else {

                    if($forms['password'] == $forms['password_confirmation']){
                
                       $forms["password"] = bcrypt($forms["password"]);

                       Users::create($forms);
                        \Session::flash('alert', 'alert-success');
                            \Session::flash('message', 'Pengguna Baru Disimpan');
                        }
                               return redirect('users');


                  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      
        $user = Users::find($id);
        return view('users/edit',compact('user'));
    }

     public function profil($id)
    {
        //
      
        $user = Profils::find($id);
        $dataid = $id;
        return view('users/profil',compact('user','dataid'));
    }

      public function struktur($id)
    {
        //
      
        $user = Profils::find($id);
        $dataid = $id;
        return view('users/struktur',compact('user','dataid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Users::find($id);
   $user->update($usUpdate);
   return redirect('users');
    }

      public function profil_update(Request $request)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
         $user=Profils::find($usUpdate["id"]);
   $user->update($usUpdate);
   return redirect('users/profil/1');
    }

      public function struktur_update(Request $request)
    {
        //

         \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Data Telah Diganti');
      $usUpdate=Request::all();
        if(Request::hasFile('foto1')) {
                                  $file = Input::file('foto1');
                                    $usUpdate['foto'] = $this->__GenerateRandomName()."-".$file->getClientOriginalName();  
                                    $file->move("asset/dokumen",$usUpdate['foto']);

                            }
         $user=Profils::find($usUpdate["id"]);
   $user->update($usUpdate);
   return redirect('users/struktur/2');
    }

     public function password_change($id)
    {
      $id = $id;
      return view('users.password',compact('id'));
    }
  public function update_password(Request $request)
    {
      $rr = Request::all();

        $nama = $rr['id'];
        if($rr['password'] == $rr['password_confirmation']){
                   $rr['password'] = bcrypt($rr['password']);
             DB::statement("update users SET password='".$rr['password']."' where id =".$nama);
              \Session::flash('alert', 'alert-success');
            \Session::flash('message', 'Password Diganti');
             return redirect('users');
        }else{
             \Session::flash('alert', 'alert-danger');
            \Session::flash('message', 'Gagal Data Belum Lengkap');
            return redirect('users/password_change/'.$nama);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
      public function hapus($id)
    {
        //
        \Session::flash('alert', 'alert-warning');
            \Session::flash('message', 'Gagal Pengguna Berhasil Dihapus');
        DB::table('users')
            ->where('id','=', $id)
            ->update(['del' => 1,'email'=>$id]);
            return redirect('users');
    }
}
