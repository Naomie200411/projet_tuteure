<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etablissement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'adresse',
        'contact',
        'name_proprio',
        'validate_status',
        'note_moy'
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    
}
