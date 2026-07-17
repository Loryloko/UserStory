<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model 
{
    protected $fillable = ['title', 'price', 'description', 'category_id', 'user_id'];

    /**
     * Relazione 1 a N (Inversa): Un annuncio appartiene a una Categoria
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relazione 1 a N (Inversa): Un annuncio appartiene a un Utente
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
