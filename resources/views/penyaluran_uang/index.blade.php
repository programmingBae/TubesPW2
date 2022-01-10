@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-4 pt-1 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <a href="{{route('penyaluranUangForm')}}"  style="color:white"  class="btn btn-danger">Add</a>

                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Penerima Donasi</th>
            <th>Jumlah</th>
            <th>Photos</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($penyaluran_uangs as $penyaluran_uang)
            <tr>
                <td>{{$penyaluran_uang->id}}</td>
                <td>{{$penyaluran_uang->penerima_donasi->nama}}</td>
                <td>{{$penyaluran_uang->jumlah}}</td>
                <td><img src="uploadedimages/{{ $penyaluran_uang->photos }}" width="100px"></td>
                <td>
                    <a  href="{{route('penyaluranUangDelete',  $penyaluran_uang->id)}}" style="color:white"  class="btn btn-danger">Delete</a>
                    <a href="{{route('penyaluranUangEdit', $penyaluran_uang->id)}}" style="color:white"  class="btn btn-danger">Update</a>
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