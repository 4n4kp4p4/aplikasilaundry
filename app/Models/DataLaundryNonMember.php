<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaundryNonMember extends Model
{
    protected $table = 'data_laundry_non_member';
    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'nama_customer',
        'alamat_customer',
        'no_telp',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim',
    ];

    protected $primaryKey = 'no_transaksi';
}
