<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $primaryKey = 'numero';
    protected $keyType = 'string';

    public $fillable = [
        'numero',
        'nbr_jour',
        'nbr_client',
        'status',
        'prix',
        'date_arrive',
        'date_depart',
        'client_id',
        'chambre_id',
    ];
}
