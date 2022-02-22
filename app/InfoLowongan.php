<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLowongan extends Model 
{
    public function Instansi()
    {
        return $this->hasOne(Instansi::class, 'id' , 'instansi');
    }
    public function Jurusan()
    {
        return $this->hasMany(Jurusan::class, 'id' , 'jurusan');
    }
    protected $fillable = [
    	'judul','isi','foto','active','jurusan','instansi'
    ];
}
