<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLowongan extends Model
{
    public function Instansi()
    {
        return $this->hasOne(Instansi::class, 'nama' , 'instansi');
    }
    protected $fillable = [
    	'judul','isi','foto','active','jurusan','instansi'
    ];
}
