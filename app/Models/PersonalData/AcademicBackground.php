<?php

namespace App\Models\PersonalData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_name',
        'institution_name',
        'position',
    ];
}
