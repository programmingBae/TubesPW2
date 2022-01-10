<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi_Uang_Has_Penerima_Donasi extends Model
{
    protected $table = 'penerima_donasi_has_donasi_uang';
    protected $fillable = ['photos, jumlah, penerima_donasi_id, donasi_barang_id'];


    public function penerima_donasi()
    {
        return $this->belongsTo(Penerima_Donasi::class);
    }
}