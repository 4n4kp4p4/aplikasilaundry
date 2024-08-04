<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaundryMember extends Model
{
    protected $table = 'data_laundry_member';
    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'member_id',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim',
    ];

    protected $primaryKey = 'no_transaksi';
}
