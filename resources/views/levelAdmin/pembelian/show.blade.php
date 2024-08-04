@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Pembelian</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$pembelian->kode_barang}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>ID Pembelian</strong> : {{$pembelian->id_pembelian}}</p>
            <p class="card-text"><strong>Nama Pegawai</strong> : {{$pembelian->nama_pegawai}}</p>
            <p class="card-text"><strong>Tanggal</strong> : {{$pembelian->tanggal}}</p>
            <p class="card-text"><strong>Jumlah</strong> : {{$pembelian->jumlah}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.pembelian.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection