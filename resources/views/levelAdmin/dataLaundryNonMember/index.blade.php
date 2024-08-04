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
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.dataLaundryNonMember.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class>No.</th>
                            <th class>Tgl Transaksi</th>
                            <th class>Nama Customer</th>
                            <th class>Nama Pegawai</th>
                            <th class>Status Laundry</th>
                            <th class>Status Pembayaran</th>
                            <th class>Lokasi Kirim</th>
                            <th class>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataLaundryNonMember as $index => $dataLaundryNonMember)
                        <tr>
                            <td class="text-center">
                                {{ ++$index }}
                            </td>
                            <td>{{$dataLaundryNonMember->tgl_transaksi}}</td>
                            <td>{{$dataLaundryNonMember->nama_customer}}</td>
                            <td>{{$dataLaundryNonMember->nama_pegawai}}</td>
                            <td>{{$dataLaundryNonMember->status_laundry}}</td>
                            <td>{{$dataLaundryNonMember->status_pembayaran}}</td>
                            <td>{{$dataLaundryNonMember->lokasi_kirim}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.dataLaundryNonMember.destroy', $dataLaundryNonMember->no_transaksi)}}" method="POST" class="d-flex justify-content-center">
                                    <a href="{{route('admin.dataLaundryNonMember.show', $dataLaundryNonMember->no_transaksi)}}" class="btn btn-dark btn" style="background-color: rgb(20, 20, 20);"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('admin.dataLaundryNonMember.edit', $dataLaundryNonMember->no_transaksi)}}" class="btn btn-primary btn" style="background-color: rgb(3, 65, 197);"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn" style="background-color: rgb(242, 3, 3);"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-info">
                            <strong>Data belum ada</strong>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection