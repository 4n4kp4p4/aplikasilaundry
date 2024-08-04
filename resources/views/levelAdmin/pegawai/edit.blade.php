@extends('dashboard.app')
@section('content')
<div class="section-header">
  <h1>Pegawai</h2>
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
      <form action="{{route('admin.pegawai.update', $pegawai->id_pegawai)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="pwd" class="form-label">Nama Pegawai</label>
          <input type="text" class="form-control" id="pwd" value="{{old('nama_pegawai', $pegawai->nama_pegawai)}}" name="nama_pegawai">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Alamat</label>
          <textarea class="form-control" name="alamat">{{old('alamat', $pegawai->alamat)}}</textarea>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="pwd" value="{{old('no_hp', $pegawai->no_hp)}}" name="no_hp">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection