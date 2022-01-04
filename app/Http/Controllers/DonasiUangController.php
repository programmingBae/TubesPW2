<?php

namespace App\Http\Controllers;

use App\donasi_uang;
use App\Donatur;
use Illuminate\Http\Request;

class DonasiUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = donasi_uang::all();
        return view('donasi_uang.index', [
            'donasi_uangs' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Donatur::all();
        return view('donasi_uang.create', [
            'donaturs' => $data
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
            'jumlah' => '',
            'image' => '',
            'txtDonatur' => ''
        ])->validate();
        $donasi_uang = new donasi_uang();
        $donasi_uang->jumlah = $data['jumlah'];
        if ($request->image){
            $imageName=$data['jumlah'].'.'.$request->image->getClientOriginalExtension();
            $donasi_uang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $donasi_uang->donatur_id = $data['txtDonatur'];
        $donasi_uang->save();
        return redirect(route('donasiUangList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\donasi_uang  $donasi_uang
     * @return \Illuminate\Http\Response
     */
    public function show(donasi_uang $donasi_uang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donasi_uang  $donasi_uang
     * @return \Illuminate\Http\Response
     */
    public function edit(donasi_uang $donasi_uang)
    {
        $data = Donatur::all();
        return view('donasi_uang.edit', [
            'donasi_barang' => $donasi_uang,
            'donaturs' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donasi_uang  $donasi_uang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donasi_uang $donasi_uang)
    {
        $data = validator($request->all(), [
            'jumlah' => ''  ,
            'image' => '',
            'txtDonatur' => ''
        ])->validate();
        $donasi_uang->jumlah = $data['jumlah'];
        if ($request->image){
            $imageName=$data['nama_barang'].'.'.$request->image->getClientOriginalExtension();
            $donasi_uang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $donasi_uang->donatur_id = $data['txtDonatur'];
        $donasi_uang->save();
        return redirect(route('donasiUangList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donasi_uang  $donasi_uang
     * @return \Illuminate\Http\Response
     */
    public function destroy(donasi_uang $donasi_uang)
    {
        $donasi_uang->delete();
        return redirect(route('donasiUangList'));
    }
}