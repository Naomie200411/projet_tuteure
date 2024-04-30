<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'commentaire',
        'date_evaluation',
    ];

    public function etablissements() : BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');

    }

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
