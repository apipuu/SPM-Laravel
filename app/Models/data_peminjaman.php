<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class data_peminjaman extends Model
{
    use LogsActivity, HasFactory;

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

    protected static $logName = 'Data Peminjaman';
    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }
}
