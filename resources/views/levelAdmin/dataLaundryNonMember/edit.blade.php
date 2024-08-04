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
      <h2 class="section-title">Edit Data</h2>
    </div>
    <div class="card-body">
      <form action="{{route('admin.dataLaundryNonMember.update', $dataLaundryNonMember->no_transaksi)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="pwd" class="form-label">Tgl Transaksi</label>
          <input type="date" class="form-control" id="pwd" value="{{old('tgl_transaksi', $dataLaundryNonMember->tgl_transaksi)}}" name="tgl_transaksi">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Nama Customer</label>
          <input type="text" class="form-control" id="pwd" value="{{old('nama_customer', $dataLaundryNonMember->nama_customer)}}" name="nama_customer">
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Alamat</label>
          <textarea class="form-control" id="pwd" name="alamat_customer">{{old('alamat_customer', $dataLaundryNonMember->alamat_customer)}}</textarea>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Telepon</label>
          <input type="text" class="form-control" id="pwd" value="{{old('no_telp', $dataLaundryNonMember->no_telp)}}" name="no_telp">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Nama Pegawai</label>
          <select class="form-control" name="id_pegawai" id="exampleFormControlSelect1">
            @foreach ($pegawai as $dt_pegawai)
            <option value="{{ $dt_pegawai->id_pegawai }}" @if(old('id_pegawai')==$dt_pegawai->id_pegawai)selected
              @elseif(!old('id_pegawai') && $dataLaundryNonMember->id_pegawai == $dt_pegawai->id_pegawai)selected
              @endif
              >{{ $dt_pegawai->nama_pegawai }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Keterangan</label>
          <textarea class="form-control" id="pwd" placeholder="Keterangan" name="keterangan">{{old('keterangan', $dataLaundryNonMember->keterangan)}}</textarea>
        </div>

        <div class="form-group">
          <label for="level" class="form-label">Status Laundry</label>
          <select class="form-control" name="status_laundry" id="level">
            @foreach(['Menunggu', 'Diproses', 'Selesai'] as $statusLaundryOptions)
            <option value="{{ $statusLaundryOptions }}" @if(old('status_laundry', $dataLaundryNonMember->status_laundry) == $statusLaundryOptions) selected @endif>
              {{ $statusLaundryOptions }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="level" class="form-label">Status Pembayaran</label>
          <select class="form-control" name="status_pembayaran" id="level">
            @foreach(['Bayar', 'Belum'] as $statusPembayaranOptions)
            <option value="{{ $statusPembayaranOptions }}" @if(old('status_pembayaran', $dataLaundryNonMember->status_pembayaran) == $statusPembayaranOptions) selected @endif>
              {{ $statusPembayaranOptions }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="pwd" class="form-label">Lokasi Kirim</label>
          <textarea class="form-control" id="pwd" name="lokasi_kirim">{{old('lokasi_kirim', $dataLaundryNonMember->lokasi_kirim)}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection