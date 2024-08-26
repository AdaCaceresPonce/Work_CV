<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'name',
        'description',
        'position',
    ];

    //Relacion uno a muchos inversa con la tabla trainings
    public function training(){
        return $this->belongsTo(Training::class);
    }
}
