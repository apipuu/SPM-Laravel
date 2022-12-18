<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class data_keanggotaan extends Model
{
    use LogsActivity, HasFactory;

    protected $table = 'data_keanggotaan';
    protected $guarded = [''];

    protected static $logName = 'Data Keanggotaan';
    protected static $logUnguarded = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }
}
