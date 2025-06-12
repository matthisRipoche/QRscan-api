<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeAcces extends Model
{
    use HasFactory;

    protected $table = 'types_acces';


    protected $fillable = [
        'name',
    ];


    public function points_acces()
    {
        return $this->hasMany(PointAcces::class);
    }

    public function badges()
    {
        return $this->hasMany(Badge::class);
    }
}
