<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_peminjaman extends Model
{
    use HasFactory;

    protected $table = 'data_peminjaman';
    public $timestamps = false;
    protected $fillable = [
        'NIK',
        'kode_buku',
        'status',
    ];

}
