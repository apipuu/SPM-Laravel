<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;

class Buku extends Model
{
    use LogsActivity, HasFactory;
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

    protected static $logName = 'Data Buku';
    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} By: " . Auth::user()->name;
    }
}