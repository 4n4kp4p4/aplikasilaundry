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
      <h2 class="section-title">Edit Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.member.update', $member->member_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="pwd" class="form-label">Nomor Identitas</label>
          <input type="text" class="form-control" id="pwd" value="{{old('no_identitas', $member->no_identitas)}}" name="no_identitas" readonly>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama</label>
          <input type="text" class="form-control" id="pwd" value="{{old('nama_member', $member->nama_member)}}" name="nama_member">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Alamat</label>
          <textarea class="form-control" id="pwd" placeholder="Masukkan Alamat" name="alamat">{{old('alamat', $member->alamat)}}</textarea>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="pwd" value="{{old('no_hp', $member->no_hp)}}" name="no_hp">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Tanggal Join</label>
          <input type="date" class="form-control" id="pwd" name="tgl_join" value="{{old('tgl_join', $member->tgl_join)}}">
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection