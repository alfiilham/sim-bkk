<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLowongan extends Model
{
    public function Instasi()
    {
        dd($this->hasOne(Instansi::class, 'id' , 'instansi'));
    }
    protected $fillable = [
    	'judul','isi','foto','active','jurusan','instansi'
    ];
}
