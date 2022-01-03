<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donasi_barang extends Model
{
    protected $table = 'donasi_barang';
    protected $fillable = ['nama_barang', 'jumlah', 'photos', 'donatur_id'];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }

   

   
}
