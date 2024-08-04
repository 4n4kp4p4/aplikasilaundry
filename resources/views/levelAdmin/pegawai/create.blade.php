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
      <h2 class="section-title">Tambah Data</h2>
    </div>
    <div class="card-body">
      <div>
        <form action="{{route('admin.pegawai.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="pwd" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="pwd" placeholder="Masukkan Nama Anda" name="nama_pegawai">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Email</label>
            <select class="form-control" name="user_id" id="exampleFormControlSelect1">
              @foreach ($user as $pengguna)
              <option value="{{ $pengguna->id }}">{{ $pengguna->email }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="pwd" class="form-label">Alamat</label>
            <textarea class="form-control" id="pwd" placeholder="Masukkan Alamat Anda" name="alamat"></textarea>
          </div>

          <div class="form-group">
            <label for="pwd" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="pwd" placeholder="Masukkan Telepon Anda" name="no_hp">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    @endsection