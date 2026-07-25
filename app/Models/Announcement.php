<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable; 

class Announcement extends Model 
{
    use Searchable; 

    protected $fillable = ['title', 'price', 'description', 'category_id', 'user_id', 'is_accepted'];

    /**
     * Configura i dati da indicizzare con Scout
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category ? $this->category->name: '',
            'is_accepted' => $this->is_accepted, 
        ];
    }

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
