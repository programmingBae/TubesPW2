@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-4 pt-1 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
            <a href="{{route('penerimaForm')}}" style="color:white"  class="btn btn-danger">Add</a>
                        
            </div>
        </div>
    </div>
</div>
<table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($penerimas as $penerima_donasi)
                <tr>
                    <td>{{$penerima_donasi->id}}</td>
                    <td>{{$penerima_donasi->nama}}</td>
                    <td>{{$penerima_donasi->no_telp}}</td>
                    <td>{{$penerima_donasi->alamat}}</td>
                    <td>
                        <a  style="color:white" href="{{route('penerimaDelete',  $penerima_donasi->id)}}" class="btn btn-danger">Delete</a>
                        <a style="color:white" href="{{route('penerimaEdit',  $penerima_donasi->id)}}" class="btn btn-danger">Update</a>
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