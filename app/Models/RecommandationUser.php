<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommandationUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'recommandation_id',
        'user_id',

    ];

    
}
