<?php

namespace App\Models\PagesContents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTrainingsPageContent extends Model
{
    use HasFactory;

    protected $table = 'our_trainings_page_contents';

    protected $fillable = [
        'cover_title',
        'cover_img',

        'our_trainings_title',
        'our_trainings_description',
        'our_trainings_img',

        'trainings_we_offer_title',
        'trainings_we_offer_description',
    ];
}
