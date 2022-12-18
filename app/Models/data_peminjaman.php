<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class data_peminjaman extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'data_peminjaman';
    public $timestamps = false;
    protected $fillable = [
        'NIK',
        'kode_buku',
        'nama_buku',  
        'tanggal_dipinjam',
        'tanggal_dikembalikan',
        'status'
    ];

}
