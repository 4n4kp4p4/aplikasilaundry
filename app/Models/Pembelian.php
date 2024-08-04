<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = [
        'id_pembelian',
        'kode_barang',
        'id_pegawai',
        'tanggal',
        'jumlah',
    ];

    protected $primaryKey = 'id_pembelian';
}
