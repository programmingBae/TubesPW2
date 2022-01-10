<?php

namespace App\Http\Controllers;

use App\donasi_barang;
use App\Donasi_Barang_Has_Penerima_Donasi;
use App\Donasi_Uang_Has_Penerima_Donasi;
use App\penerima_donasi;
use Illuminate\Http\Request;

class PenyaluranUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Donasi_Uang_Has_Penerima_Donasi::all();
        return view('penyaluran_uang.index', [
            'penyaluran_uangs' => $data
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
        return view('penyaluran_uang.create', [
            'penerima_donasis' => $penerima_donasi,
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
            'txtPenerima' => ''
        ])->validate();
        $penyaluran_uang = new Donasi_Uang_Has_Penerima_Donasi();
        if ($request->image){
            $imageName=$data['txtJumlah'].'.'.$request->image->getClientOriginalExtension();
            $penyaluran_uang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $penyaluran_uang->jumlah = $data['txtJumlah'];
        $penyaluran_uang->penerima_donasi_id = $data['txtPenerima'];
        $penyaluran_uang->save();
        return redirect(route('penyaluranUangList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donasi_Uang_Has_Penerima_Donasi  $donasi_Uang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi_Uang_Has_Penerima_Donasi $donasi_Uang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $donasi_Uang_Has_Penerima_Donasi = Donasi_Uang_Has_Penerima_Donasi::find($id);
        $penerima_donasi = penerima_donasi::all();
        return view('penyaluran_uang.edit', [
            'penyaluran_uang' => $donasi_Uang_Has_Penerima_Donasi,
            'penerima_donasis' => $penerima_donasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donasi_Uang_Has_Penerima_Donasi  $donasi_Uang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi_Uang_Has_Penerima_Donasi $donasi_Uang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $donasi_Uang_Has_Penerima_Donasi = Donasi_Uang_Has_Penerima_Donasi::find($id);
        $penerima_uang = penerima_donasi::all();
        return view('penyaluran_uang.edit', [
            'penyaluran_uang' => $donasi_Uang_Has_Penerima_Donasi,
            'penerima_donasis' => $penerima_uang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donasi_Uang_Has_Penerima_Donasi  $donasi_Uang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donasi_Uang_Has_Penerima_Donasi $donasi_Uang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $penyaluran_uang = Donasi_Uang_Has_Penerima_Donasi::find($id);
        $data = validator($request->all(), [
            'txtJumlah' => '',
            'txtPenerima' => ''
        ])->validate();
        if ($request->image){
            $imageName=$data['txtJumlah'].'.'.$request->image->getClientOriginalExtension();
            $penyaluran_uang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $penyaluran_uang->jumlah = $data['txtJumlah'];
        $penyaluran_uang->penerima_donasi_id = $data['txtPenerima'];
        $penyaluran_uang->save();
        return redirect(route('penyaluranUangList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donasi_Uang_Has_Penerima_Donasi  $donasi_Uang_Has_Penerima_Donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi_Uang_Has_Penerima_Donasi $donasi_Uang_Has_Penerima_Donasi)
    {
        $url = url()->current();
        $url = explode('/', $url);
        $id = $url[count($url)-1];
        $donasi_Uang_Has_Penerima_Donasi = Donasi_Uang_Has_Penerima_Donasi::find($id);
        unlink(public_path('/uploadedimages/').$donasi_Uang_Has_Penerima_Donasi->photos);
        $donasi_Uang_Has_Penerima_Donasi->delete();
        return redirect(route('penyaluranUangList'));
    }
}