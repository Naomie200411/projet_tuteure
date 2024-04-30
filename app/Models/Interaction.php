<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_visite',
    ];
    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    public function etablissements() : BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');

    }
}
