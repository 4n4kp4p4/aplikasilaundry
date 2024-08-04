@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Barang</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$barang->nama_barang}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Kode Barang</strong> : {{$barang->kode_barang}}</p>
            <p class="card-text"><strong>Harga</strong> : {{$barang->harga}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.barang.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection