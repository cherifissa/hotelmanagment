<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChambreGategorie extends Model
{
    use HasFactory;
    public $fillable = [
        'nom',
        'prix',
        'description'
    ];
}
