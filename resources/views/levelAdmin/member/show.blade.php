@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Member</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h5 class="section-title">{{$member->nama_member}}</h5>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>ID Member</strong> : {{$member->member_id}}</p>
            <p class="card-text"><strong>No. Identitas</strong> : {{$member->no_identitas}}</p>
            <p class="card-text"><strong>Email</strong> : {{$member->email}}</p>
            <p class="card-text"><strong>Alamat</strong> : {{$member->alamat}}</p>
            <p class="card-text"><strong>Telepon</strong> : {{$member->no_hp}}</p>
            <p class="card-text"><strong>Tanggal Join</strong> : {{$member->tgl_join}}</p>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="{{route('admin.member.index')}}" class="btn btn-primary"><i class="fas fa-caret-left"></i></a>
        </div>
    </div>
</div>
</div>
@endsection