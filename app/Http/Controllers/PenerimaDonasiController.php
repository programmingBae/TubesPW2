<?php

namespace App\Http\Controllers;

use App\penerima_donasi;
use Illuminate\Http\Request;

class PenerimaDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = penerima_donasi::all();
        return view('penerima_donasi.index', [
            'penerimas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerima_donasi.create');
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
            'nama' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string    |max:100'
        ])->validate();
        $penerima_donasi = new penerima_donasi();
        $penerima_donasi->nama = $data['nama'];
        $penerima_donasi->no_telp = $data['no_telp'];
        $penerima_donasi->alamat = $data['alamat'];
        $penerima_donasi->save();
        return redirect(route('penerimaList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\penerima_donasi  $penerima_donasi
     * @return \Illuminate\Http\Response
     */
    public function show(penerima_donasi $penerima_donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\penerima_donasi  $penerima_donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(penerima_donasi $penerima_donasi)
    {
        return view('penerima_donasi.edit', [
            'penerima_donasi' => $penerima_donasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\penerima_donasi  $penerima_donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penerima_donasi $penerima_donasi)
    {
        $data = validator($request->all(), [
            'nama' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string    |max:100'
        ])->validate();
        $penerima_donasi->nama = $data['nama'];
        $penerima_donasi->no_telp = $data['no_telp'];
        $penerima_donasi->alamat = $data['alamat'];
        $penerima_donasi->save();
        return redirect(route('penerimaList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\penerima_donasi  $penerima_donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(penerima_donasi $penerima_donasi)
    {
        $penerima_donasi->delete();
        return redirect(route('penerimaList'));
    }
}
