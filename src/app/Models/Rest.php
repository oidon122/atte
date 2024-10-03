<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rest extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'attendance_id',
        'rest_start',
        'rest_end'
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
