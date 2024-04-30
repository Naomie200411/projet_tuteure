<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut',
        'date_fin',
        'details_promotion',
    ];

    public function etablissements() : BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');

    }
}
