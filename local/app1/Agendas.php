<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendas extends Model
{
    //
    protected $fillable = ['judul','tanggal_mulai','del','tanggal_selesai','deskripsi','user_by','tempat'];
}
