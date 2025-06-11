<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentars extends Model
{
    //
    protected $fillable = ["name","isi","tanggal","berita_id","email","del"];

     public function berita_data()
    {
    return $this->belongsTo('App\Beritas','berita_id','id');
    
    }
}
