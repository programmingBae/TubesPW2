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
    <form method="POST" action='{{route('penyaluranUangSave')}}' enctype="multipart/form-data">
        @csrf
        <div style="margin-left: 10px; margin-top:15px" class="form-group">
            <label for="supplierType2">Penerima Donasi</label>
            <select id="supplierType2" name="txtPenerima" class="form-control" placeholder="tes">
                @foreach($penerima_donasis as $k)
                    <option value="{{$k->id}}">{{$k->nama}}</option>
                @endforeach
            </select>
            <label id='txtTelpId' for="txtJumlah">Jumlah</label>
            <input type="text" class="form-control" id="txtJumlah" name="txtJumlah" placeholder="Enter Supplier Telp" required>
            <label for="image">Bukti Foto</label>
            <input type="file" name="image" class="form-control" placeholder="image">
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