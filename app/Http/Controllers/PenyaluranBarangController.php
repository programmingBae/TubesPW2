<?php

namespace App\Http\Controllers;

use App\donasi_barang;
use App\Donasi_Barang_Has_Penerima_Donasi;
use App\penerima_donasi;
use Illuminate\Http\Request;

class PenyaluranBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Donasi_Barang_Has_Penerima_Donasi::all();
        return view('penyaluran_barang.index', [
            'penyaluran_barangs' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerima_donasi = penerima_donasi::all();
        $donasi_barang = donasi_barang::all();
        return view('penyaluran_barang.create', [
            'penerima_donasis' => $penerima_donasi,
            'donasi_barangs' => $donasi_barang
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = validator($request->all(), [
            'txtJumlah' => '',
            'txtDonasiBarang' => '',
            'txtPenerima' => ''
        ])->validate();
        $penyaluran_barang = new Donasi_Barang_Has_Penerima_Donasi();
        if ($request->image){
            $imageName=$data['txtDonasiBarang'].'.'.$request->image->getClientOriginalExtension();
            $penyaluran_barang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $penyaluran_barang->jumlah = $data['txtJumlah'];
        $penyaluran_barang->donasi_barang_id = $data['txtDonasiBarang'];
        $penyaluran_barang->penerima_donasi_id = $data['txtPenerima'];
        $penyaluran_barang->save();
        return redirect(route('penyaluranBarangList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donasi_Barang_Has_Penerima_Donasi  $donasi_Barang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi_Barang_Has_Penerima_Donasi $donasi_Barang_Has_Penerima_Donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donasi_Barang_Has_Penerima_Donasi  $donasi_Barang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi_Barang_Has_Penerima_Donasi $donasi_Barang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $donasi_Barang_Has_Penerima_Donasi = Donasi_Barang_Has_Penerima_Donasi::find($id);
        $penerima_donasi = penerima_donasi::all();
        $donasi_barang = donasi_barang::all();
        return view('penyaluran_barang.edit', [
            'penyaluran_barang' => $donasi_Barang_Has_Penerima_Donasi,
            'penerima_donasis' => $penerima_donasi,
            'donasi_barangs' => $donasi_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donasi_Barang_Has_Penerima_Donasi  $donasi_Barang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donasi_Barang_Has_Penerima_Donasi $empty)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $penyaluran_barang = Donasi_Barang_Has_Penerima_Donasi::find($id);
        $data = validator($request->all(), [
            'txtJumlah' => '',
            'txtDonasiBarang' => '',
            'txtPenerima' => ''
        ])->validate();
        if ($request->image){
            $imageName=$data['txtDonasiBarang'].'.'.$request->image->getClientOriginalExtension();
            $penyaluran_barang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $penyaluran_barang->jumlah = $data['txtJumlah'];
        $penyaluran_barang->donasi_barang_id = $data['txtDonasiBarang'];
        $penyaluran_barang->penerima_donasi_id = $data['txtPenerima'];
        $penyaluran_barang->save();
        return redirect(route('penyaluranBarangList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donasi_Barang_Has_Penerima_Donasi  $donasi_Barang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi_Barang_Has_Penerima_Donasi $donasi_Barang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $donasi_Barang_Has_Penerima_Donasi = Donasi_Barang_Has_Penerima_Donasi::find($id);
        unlink(public_path('/uploadedimages/').$donasi_Barang_Has_Penerima_Donasi->photos);
        $donasi_Barang_Has_Penerima_Donasi->delete();
        return redirect(route('penyaluranBarangList'));
    }
}
