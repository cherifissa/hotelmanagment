<?php

namespace App\Models;

use App\Models\Chambre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
}
