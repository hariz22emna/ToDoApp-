<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Autoriser l'insertion de ces champs via create() ou update()
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];
}
