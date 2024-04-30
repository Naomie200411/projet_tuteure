<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtablissementUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'etablissement_id',
        'user_id',

    ];
    
}
