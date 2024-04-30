<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'date_envoi',
        'statut_lecture',
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function promotions() : BelongsTo
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');

    }
}
