@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-4 pt-1 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <a href="{{route('DonaturForm')}}" style="color:white" class="btn btn-danger">Add</a>
            </div>
        </div>
    </div>
</div>

<table class = "table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>
    @foreach($donaturs as $donatur)
        <tr>
            <td>{{$donatur->id}}</td>
            <td>{{$donatur->nama}}</td>
            <td>{{$donatur->no_telp}}</td>
            <td>{{$donatur->alamat}}</td>
            <td>
                <a href="{{route('DonaturEdit',$donatur->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('DonaturDelete',$donatur->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
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
