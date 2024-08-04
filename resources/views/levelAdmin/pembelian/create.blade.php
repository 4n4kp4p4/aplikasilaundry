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
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.pembelian.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="pwd" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan Kode Barang" name="kode_barang">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Nama Pegawai</label>
          <select class="form-control" name="id_pegawai" id="exampleFormControlSelect1">
            @foreach ($pegawai as $pegawai)
            <option value="{{ $pegawai->id_pegawai }}">{{ $pegawai->nama_pegawai }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Tanggal</label>
          <input type="date" class="form-control" id="pwd" placeholder="Masukkan Tanggal" name="tanggal">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Jumlah</label>
          <input type="number" class="form-control" id="pwd" placeholder="Masukkan Jumlah" name="jumlah">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection