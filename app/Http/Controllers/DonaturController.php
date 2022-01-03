<?php

namespace App\Http\Controllers;

use App\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Donatur::all();
        return view('donatur.index', [
            'donaturs' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create');
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
           'nama'=> 'required|string|max:100',
           'no_telp'=> 'required|string|max:20',
           'alamat'=> 'required|string|max:100'

        ])->validate();
        $donatur = new Donatur();
        $donatur->nama =$data['nama'];
        $donatur->no_telp =$data['no_telp'];
        $donatur->alamat =$data['alamat'];
        $donatur->save();
        return redirect(route('DonaturList'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', [
            'donatur'=>$donatur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donatur $donatur)
    {
        $data = validator($request->all(), [
            'nama'=> 'required|string|max:100',
            'no_telp'=> 'required|string|max:20',
            'alamat'=> 'required|string|max:100'

        ])->validate();
        $donatur->nama =$data['nama'];
        $donatur->no_telp =$data['no_telp'];
        $donatur->alamat =$data['alamat'];
        $donatur->save();
        return redirect(route('DonaturList'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donatur $donatur)
    {
        $donatur->delete();
        return redirect(route('DonaturList'));
    }
}
