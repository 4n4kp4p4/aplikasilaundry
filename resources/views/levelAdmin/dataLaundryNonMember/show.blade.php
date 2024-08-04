@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Non Member</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$dataLaundryNonMember->no_transaksi}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Tgl Transaksi</strong> : {{$dataLaundryNonMember->tgl_transaksi}}</p>
            <p class="card-text"><strong>Nama Customer</strong> : {{$dataLaundryNonMember->nama_customer}}</p>
            <p class="card-text"><strong>Alamat</strong> : {{$dataLaundryNonMember->alamat_customer}}</p>
            <p class="card-text"><strong>Telepon</strong> : {{$dataLaundryNonMember->no_telp}}</p>
            <p class="card-text"><strong>Nama Pegawai</strong> : {{$dataLaundryNonMember->nama_pegawai}}</p>
            <p class="card-text"><strong>Keterangan</strong> : {{$dataLaundryNonMember->keterangan}}</p>
            <p class="card-text"><strong>Status Laundry</strong> : {{$dataLaundryNonMember->status_laundry}}</p>
            <p class="card-text"><strong>Status Pembayaran</strong> : {{$dataLaundryNonMember->status_pembayaran}}</p>
            <p class="card-text"><strong>Lokasi Kirim</strong> : {{$dataLaundryNonMember->lokasi_kirim}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.dataLaundryNonMember.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection