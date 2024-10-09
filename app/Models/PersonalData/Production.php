<?php

namespace App\Models\PersonalData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $casts = [
        'publication_date' => 'date',
    ];

    protected $fillable = [
        'title',
        'url',
        'publication_date',
        'abstract',
        'journal_name'
    ];
}
