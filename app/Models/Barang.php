<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'id_barang',
        'kode_barang',
        'nama_barang',
        'harga',
    ];

    protected $primaryKey = 'id_barang';
}
