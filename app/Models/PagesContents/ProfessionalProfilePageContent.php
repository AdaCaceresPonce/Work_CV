<?php

namespace App\Models\PagesContents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalProfilePageContent extends Model
{
    use HasFactory;

    protected $table = 'professional_profile_page_contents';

    protected $fillable = [

        'cover_title',
        'cover_img',

        'employment_history_title',
        'employment_history_img',

        'academic_backgrounds_title',

        'my_skills_title',
        'my_skills_img',

        'my_productions_title',
        
    ];

}
