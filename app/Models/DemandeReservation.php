<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'email_client',
        'tel_client',
        'date_arrive',
        'date_depart',
        'type_chambre',
        'nombre_adulte',
        'nombre_enfant'
    ];
}
