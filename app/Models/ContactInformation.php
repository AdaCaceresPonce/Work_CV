<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $table = 'contact_information';

    protected $fillable = [
        'phone',
        'cellphone',
        'email',
        'whatsapp_number',
        'whatsapp_message',
        'facebook_link',
        'twitter_link',
        'instagram_link',
    ];
}
