<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'date',
        'point_acces_id',
    ];


    public function badges()
    {
        return $this->hasMany(Badge::class);
    }
}
