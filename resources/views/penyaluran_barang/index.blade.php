@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-4 pt-1 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
            <a href="{{route('penyaluranBarangForm')}}"  style="color:white"  class="btn btn-danger">Add</a>
                        
            </div>
        </div>
    </div>
</div>
<table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penerima Donasi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Photos</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($penyaluran_barangs as $penyaluran_barang)
                <tr>
                    <td>{{$penyaluran_barang->id}}</td>
                    <td>{{$penyaluran_barang->penerima_donasi->nama}}</td>
                    <td>{{$penyaluran_barang->donasi_barang->nama_barang}}</td>
                    <td>{{$penyaluran_barang->jumlah}}</td>
                    <td><img src="uploadedimages/{{ $penyaluran_barang->photos }}" width="100px"></td>
                    <td>
                        <a  href="{{route('penyaluranBarangDelete',  $penyaluran_barang->id)}}" style="color:white"  class="btn btn-danger">Delete</a>
                        <a href="{{route('penyaluranBarangEdit', $penyaluran_barang->id)}}" style="color:white"  class="btn btn-danger">Update</a>
                    </td>
                </tr>

                @endforeach
        </table>
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