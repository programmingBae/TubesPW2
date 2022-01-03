<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerima_donasi extends Model
{
    protected $table = 'penerima_donasis';
    protected $filltable = ['id','nama', 'no_telp' , 'alamat'];
}
