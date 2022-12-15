<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class data_laporan extends Model
{
    use LogsActivity;

    use HasFactory;
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
}
