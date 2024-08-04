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
      <h2 class="section-title">Edit Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.barang.update', $barang->id_barang)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kode Barang</label>
          <select class="form-control" name="kode_barang" id="exampleFormControlSelect1">
            @foreach ($pembelian as $dt_pembelian)
            <option value="{{ $dt_pembelian->kode_barang }}" @if(old('kode_barang')==$dt_pembelian->kode_barang)selected
              @elseif(!old('kode_barang') && $barang->kode_barang == $dt_pembelian->kode_barang)selected
              @endif
              >{{ $dt_pembelian->kode_barang }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" id="pwd" value="{{old('nama_barang', $barang->nama_barang)}}" name="nama_barang">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Harga</label>
          <input type="number" class="form-control" id="pwd" value="{{old('harga', $barang->harga)}}" name="harga">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection