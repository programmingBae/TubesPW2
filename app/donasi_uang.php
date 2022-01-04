<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donasi_uang extends Model
{
    protected $table = 'donasi_uang';
    protected $fillable = ['jumlah', 'photos', 'donatur_id'];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }
}