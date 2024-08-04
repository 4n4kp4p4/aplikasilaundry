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
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.barang.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class>No.</th>
                            <th class>Kode Barang</th>
                            <th class>Nama Barang</th>
                            <th class>Jumlah</th>
                            <th class>Harga</th>
                            <th class>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barang as $index => $barang)
                        <tr>
                            <td class="text-center">
                                {{ ++$index }}
                            </td>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->jumlah}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.barang.destroy', $barang->id_barang)}}" method="POST" class="d-flex justify-content-center">
                                    <a href="{{route('admin.barang.show', $barang->id_barang)}}" class="btn btn-dark btn" style="background-color: rgb(20, 20, 20);"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('admin.barang.edit', $barang->id_barang)}}" class="btn btn-primary btn" style="background-color: rgb(3, 65, 197);"><i class="fas fa-pen"></i></a>
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