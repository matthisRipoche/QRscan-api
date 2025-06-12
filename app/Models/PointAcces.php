<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PointAcces extends Model
{
    use HasFactory;

    protected $table = 'points_acces';

    protected $fillable = [
        'name',
        'event_id',
        'type_acces_id',
    ];

    public function type_acces()
    {
        return $this->belongsTo(TypeAcces::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
