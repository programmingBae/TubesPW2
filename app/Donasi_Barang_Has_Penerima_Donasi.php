<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi_Barang_Has_Penerima_Donasi extends Model
{
    protected $table = 'donasi_barang_has_penerima_donasi';
    protected $fillable = ['photos, jumlah, penerima_donasi_id, donasi_barang_id'];

    public function donasi_barang()
    {
        return $this->belongsTo(Donasi_Barang::class);
    }

    public function penerima_donasi()
    {
        return $this->belongsTo(Penerima_Donasi::class);
    }
}
