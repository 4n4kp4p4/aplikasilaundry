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
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.member.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="pwd" class="form-label">Nomor Identitas</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan No. Identitas" name="no_identitas">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan Nama" name="nama_member">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Alamat</label>
          <textarea class="form-control" id="pwd" placeholder="Masukkan Alamat" name="alamat"></textarea>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="pwd" placeholder="Masukkan Nomor Telepon" name="no_hp">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Tanggal Join</label>
          <input type="date" class="form-control" id="pwd" name="tgl_join">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection