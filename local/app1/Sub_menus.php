<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_menus extends Model
{
    //
    public function menu_data()
    {
    return $this->belongsTo('App\Menus','menu_id','id');
    
    }

     public function jenis_berita_id()
    {
    return $this->belongsTo('App\Jenis_beritas','from_id','id');
    
    }
     public function jenis_dokumen_id()
    {
    return $this->belongsTo('App\Jenis_dokumens','from_id','id');
    
    }
   
  
}
