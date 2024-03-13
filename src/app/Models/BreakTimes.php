<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakTimes extends Model
{
    use HasFactory;

    protected $fillable = [
		'attendance_id',
		'break_begin',
		'break_end',
    ];

    public function user() {
        return $this->belongsTo(Attendance::class);
    }
}
