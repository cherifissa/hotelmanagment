<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChambreCategorie extends Model
{
    use HasFactory;

    public $fillable = [
        'nom_categorie',
        'prix',
        'wifi',
        'petit_dej',
        'nbr_lit',
        'nbr_chb',
        'images',
        'description'
    ];
}
