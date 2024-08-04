@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Member Laundry</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$dataLaundryMember->no_transaksi}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Tgl Transaksi</strong> : {{$dataLaundryMember->tgl_transaksi}}</p>
            <p class="card-text"><strong>Nama Member</strong> : {{$dataLaundryMember->nama_member}}</p>
            <p class="card-text"><strong>Nama Pegawai</strong> : {{$dataLaundryMember->nama_pegawai}}</p>
            <p class="card-text"><strong>Keterangan</strong> : {{$dataLaundryMember->keterangan}}</p>
            <p class="card-text"><strong>Status Laundry</strong> : {{$dataLaundryMember->status_laundry}}</p>
            <p class="card-text"><strong>Status Pembayaran</strong> : {{$dataLaundryMember->status_pembayaran}}</p>
            <p class="card-text"><strong>Lokasi Kirim</strong> : {{$dataLaundryMember->lokasi_kirim}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.dataLaundryMember.index', $dataLaundryMember->no_transaksi)}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection