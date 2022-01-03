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
    <form method="POST" action='{{route('DonaturUpdate',$donatur->id)}}'>
        @csrf
        <div style="margin-left: 10px; margin-top:15px" class="form-group">
            <label id='txtNameId' for="txtName">Nama</label>
            <input type="text" class="form-control" id="txtName" name="nama" placeholder="Nama Donatur" value="{{$donatur->nama}}" required>
            <label id='txtTelpId' for="txtTelp">No Telepon</label>
            <input type="text" class="form-control" id="txtTelp" name="no_telp" placeholder="Masukkan No Telepon Donatur"  value="{{$donatur->no_telp}}" required>
            <label id='txtAlamatId' for="txtAlamat">Alamat</label>
            <input type="text" class="form-control" id="txtAlamat" name="alamat" placeholder="Masukkan Alamat Donatur" value="{{$donatur->alamat}}" required>
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
