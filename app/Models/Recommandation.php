<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recommandation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_recommandation',
        
    ];

    public function etablissements() : BelongsTo
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'recommandation_users');
    }
}
