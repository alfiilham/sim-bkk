<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function datasiswa()
    {
        return $this->hasOne(DataSiswa::class, 'user_id','user_id');
    }

    protected $fillable = [
    	'user_id','isi'
    ];
}
