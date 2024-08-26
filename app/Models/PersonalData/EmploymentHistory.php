<?php

namespace App\Models\PersonalData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'description',
        'position',
    ];

}
