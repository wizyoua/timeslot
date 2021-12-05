<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'title',
        'start_date',
        'end_date',
        'cancel_state'
    ];
}
