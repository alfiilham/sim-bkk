<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','role','foto','email'
    ];

    public function data()
    {
        return $this->hasOne(Siswa::class);
    }
    public function dataInstansi()
    {
        return $this->hasOne(Instansi::class, 'nama' , 'name');
    }
     public function latestData()
    {
        return $this->hasOne(dataStatus::class)->latest();
    }

    public function datasiswa()
    {
        return $this->hasOne(DataSiswa::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
