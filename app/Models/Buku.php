<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Buku extends Model
{
    use LogsActivity;

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'buku';
    public $timestamps = false;
    protected $fillable = [
        'kode_buku',
        'nama_buku',
        'jumlah_buku',
        'penulis',
        'penerbit',
        'jenis_buku',
        'status',
    ];
}