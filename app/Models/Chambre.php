<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'status',
        'categorie_id'
    ];
}
