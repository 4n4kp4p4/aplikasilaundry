@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$pegawai->nama_pegawai}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>ID Pegawai</strong> : {{$pegawai->id_pegawai}}</p>
            <p class="card-text"><strong>Email</strong> : {{$pegawai->email}}</p>
            <p class="card-text"><strong>Alamat</strong> : {{$pegawai->alamat}}</p>
            <p class="card-text"><strong>Jabatan</strong> : {{$pegawai->level}}</p>
            <p class="card-text"><strong>Telepon</strong> : {{$pegawai->no_hp}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.pegawai.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection