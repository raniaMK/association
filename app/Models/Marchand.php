<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marchand extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_marchand',
        'prenom_marchand',
        'CIN',
        'tel',
        'login',
        'password',
        'adresse_marchand'
    ];
    protected $hidden = [
        'password',
    ];
}
