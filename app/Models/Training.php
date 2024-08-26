<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'card_img_path',
        'cover_img_path',
        'additional_info',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    //Relacion uno a muchos con la tabla topics
    public function topics(){
        return $this->hasMany(Topic::class);
    }
}
