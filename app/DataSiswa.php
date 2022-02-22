<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    public function dataUser()
    {
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
    protected $table = 'datasiswa';

}
