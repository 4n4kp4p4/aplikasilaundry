<tbody>
    @forelse ($dataPegawai as $index => $pegawai)
    <tr>
        <td class="text-center">{{ ++$index }}</td>
        <td>{{ $pegawai->nama_pegawai }}</td>
        <td>{{ $pegawai->alamat }}</td>
        <td>{{ $pegawai->pegawai_id }}</td>
        <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" class="text-center">
            <div class="alert alert-danger">
                Data Pegawai Belum Ada.
            </div>
        </td>
    </tr>
    @endforelse
</tbody>
