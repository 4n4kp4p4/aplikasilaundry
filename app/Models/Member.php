<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = [
        'member_id',
        'nama_member',
        'no_identitas',
        'alamat',
        'no_hp',
        'tgl_join',
    ];

    protected $primaryKey = 'member_id';
}