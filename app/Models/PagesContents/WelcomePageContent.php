<?php

namespace App\Models\PagesContents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomePageContent extends Model
{
    use HasFactory;

    protected $table = 'welcome_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_description',
        'cover_img',

        'about_description',

        'our_trainings_title',
        'our_trainings_description',

        'why_choose_our_trainings_title',
        'why_choose_our_trainings_description',
        'why_choose_our_trainings_img',
        
        'testimonials_title',
        'testimonials_description',
    ];

}
