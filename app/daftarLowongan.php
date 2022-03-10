<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daftarLowongan extends Model
{
    public function Instansi()
    {
        return $this->hasOne(Instansi::class, 'id' , 'instansi_id');
    }
    public function user()
    {
        return $this->hasOne(Jurusan::class, 'id' , 'user_id');
    }
    public function Lowongan()
    {
        return $this->hasOne(InfoLowongan::class, 'id' , 'infoLowongan_id');
    }
    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id' , 'jurusan_id');
    }
    public function Datasiswa()
    {
        return $this->belongsTo(DataSiswa::class, 'user_id' , 'user_id');
    }
    protected $fillable = [
    	'user_id','instansi_id','infoLowongan_id','jurusan_id','status'
    ];
}
