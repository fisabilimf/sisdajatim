<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beritas extends Model
{
    //
    protected $fillable = ['judul','tanggal','del','isi','kutipan','user_by','status','jenis_berita_id','foto','jenis'];
      public function userdata()
    {
    return $this->belongsTo('App\Users','user_by','id');
    
    }
      public function jenis_berita_data()
    {
    return $this->belongsTo('App\Jenis_beritas','jenis_berita_id','id');
    
    }
}
