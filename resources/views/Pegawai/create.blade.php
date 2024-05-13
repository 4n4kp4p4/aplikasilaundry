<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Tambah Data Pegawai</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('pegawai.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pegawai" class="form-label">Pegawai_ID</label>
                            <input type="text" class="form-control" id="Pegawai_ID" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="nama_pegawai" class="form-label">nama_pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">jenis_kelamin</label>
                            <input type="text" class="form-control" id="no_hp" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">
                        </div>
                        <div class="mb-3">
                            <label for="nama_pegawai" class="form-label">jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="nama_pegawai" placeholder="Masukkan Jenis Jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Status Anda">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>