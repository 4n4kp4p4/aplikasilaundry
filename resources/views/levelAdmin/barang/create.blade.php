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
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.barang.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kode Barang</label>
          <select class="form-control" name="kode_barang" id="exampleFormControlSelect1">
            @foreach ($pembelian as $pembelian)
            <option value="{{ $pembelian->kode_barang }}">{{ $pembelian->kode_barang }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan Nama" name="nama_barang">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Harga</label>
          <input type="number" class="form-control" id="pwd" placeholder="Masukkan Harga" name="harga">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection