<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'college_name',
        'program_name',
        'location',
        'url',
        'started_at',
        'ended_at',
    ];
}
