<?php

namespace App\Http\Controllers;
use DB; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $dataBarang = DB::table('donasi_barang')->get();
        $dataUang = DB::table('donasi_uang')->get();
        $dataTotalUang = DB::table('donasi_uang')->sum('jumlah');
        $dataTotalBarang = DB::table('donasi_barang')->count();
        $dataDonatur = DB::table('donatur')->count();
        $dataPenerima = DB::table('penerima_donasis')->count();
        $dataPenyaluranBarang = DB::table('donasi_barang_has_penerima_donasi')->count();
        $dataPenyaluranUang = DB::table('penerima_donasi_has_donasi_uang')->count();
        $dataTotalPenyaluran = $dataPenyaluranBarang + $dataPenyaluranUang;
        return view('dashboard', [
            'dataBarang' => $dataBarang,
            'dataUang' => $dataUang,
            'dataTotalUang' => $dataTotalUang,
            'dataTotalBarang' => $dataTotalBarang,
            'dataDonatur' => $dataDonatur,
            'dataPenerima' => $dataPenerima,
            'dataPenyaluranBarang' => $dataPenyaluranBarang,
            'dataPenyaluranUang' => $dataPenyaluranUang,
            'dataTotalPenyaluran' => $dataTotalPenyaluran
        ]);

    }
}
