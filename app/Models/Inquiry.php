<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'institution_name',
        'location',
        'training_id',
        'contact_number',
        'message',
        'state',
    ];

    //Relacion uno a muchos inversa
    public function training(){
        return $this->belongsTo(Training::class);
    }

}
