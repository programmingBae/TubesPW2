<?php

namespace App\Http\Controllers;
use DB;
use App\donasi_barang;
use App\Donatur;
use Illuminate\Http\Request;

class DonasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = donasi_barang::all();
        return view('donasi_barang.index', [
            'donasi_barangs' => $data
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
        return view('donasi_barang.create', [
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
            'nama_barang' => '',
            'jumlah' => ''  ,
            'image' => '',  
            'txtDonatur' => ''  
        ])->validate();
        $donasi_barang = new donasi_barang();
        $donasi_barang->nama_barang = $data['nama_barang'];
        $donasi_barang->jumlah = $data['jumlah'];
        if ($request->image){
            $imageName=$data['nama_barang'].'.'.$request->image->getClientOriginalExtension();
            $donasi_barang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $donasi_barang->donatur_id = $data['txtDonatur'];
        $donasi_barang->save();
        return redirect(route('donasiBarangList'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\donasi_barang  $donasi_barang
     * @return \Illuminate\Http\Response
     */
    public function show(donasi_barang $donasi_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donasi_barang  $donasi_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(donasi_barang $donasi_barang)
    {

        $data = Donatur::all();
        return view('donasi_barang.edit', [
            'donasi_barang' => $donasi_barang,
            'donaturs' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donasi_barang  $donasi_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donasi_barang $donasi_barang)
    {
        $data = validator($request->all(), [
            'nama_barang' => '',
            'jumlah' => ''  ,
            'image' => '',  
            'txtDonatur' => ''  
        ])->validate();
        $donasi_barang->nama_barang = $data['nama_barang'];
        $donasi_barang->jumlah = $data['jumlah'];
        if ($request->image){
            unlink(public_path('/uploadedimages/').$donasi_barang->photos);
            $imageName=$data['nama_barang'].'.'.$request->image->getClientOriginalExtension();
            $donasi_barang->photos=$imageName;
            $request->image->move(public_path('/uploadedimages'), $imageName);
        }
        $donasi_barang->donatur_id = $data['txtDonatur'];
        $donasi_barang->save();
        return redirect(route('donasiBarangList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donasi_barang  $donasi_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(donasi_barang $donasi_barang)
    {
        $donasi_barang->delete();
        unlink(public_path('/uploadedimages/').$donasi_barang->photos);
        return redirect(route('donasiBarangList'));
    }
}
