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
}
