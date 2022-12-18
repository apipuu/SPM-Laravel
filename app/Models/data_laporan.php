<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;

class data_laporan extends Model
{
    use LogsActivity, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'laporan';
    public $timestamps = false;
    protected $fillable = [
        'NIK',
        'nama',
        'isi_laporan',  
        'tanggal_dibuat'
    ];

    protected static $logName = 'Data Laporan';
    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }
}
