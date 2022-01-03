@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-4 pt-1 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">


                </div>
            </div>
        </div>
    </div>
    {{-- main content here --}}
    <form method="POST" action='{{route('donasiBarangSave')}}' enctype="multipart/form-data">
        @csrf
        <div style="margin-left: 10px; margin-top:15px" class="form-group">
            <label id='txtNameId' for="txtNamaBarang">Nama Barang</label>
            <input type="text" class="form-control" id="txtNamaBarang" name="nama_barang" value="{{$donasi_barang->nama_barang}}" required>
            <label id='txtTelpId' for="txtJumlah">Jumlah</label>
            <input type="text" class="form-control" id="txtJumlah" name="jumlah"  value="{{$donasi_barang->jumlah}}" required>
            <label  for="image">Image</label>
            <input type="file" name="image" class="form-control" placeholder="image">
            <label for="supplierType">Donatur</label>
            <select id = "supplierType" name="txtDonatur" class="form-control" placeholder="tes">
                @foreach($donaturs as $k)
                @if ($k->id != $donasi_barang->donatur_id) {
                    <option value="{{$k->id}}">{{$k->nama}}</option>
                } @else {
                    <option value="{{$k->id}}" selected>{{$k->nama}}</option>
                } 
                @endif
                @endforeach
            </select>
        </div>
        <input style="margin-left: 10px" type="submit" class="btn btn-primary" value="Submit">
    </form>
    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
            </div>
            <div class="col-xl-4">
            </div>
        </div>
        <div class="row mt-5">

        </div>
        <div style="margin-top: 60vh">

            @include('layouts.footers.auth')

        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
