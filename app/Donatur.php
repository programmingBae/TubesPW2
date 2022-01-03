<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $fillable = ['id', 'nama', 'no_telp', 'alamat'];
}
