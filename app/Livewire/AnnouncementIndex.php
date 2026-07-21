<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementIndex extends Component
{
    public $searched = '';
    public $category_id = '';

    /**
     * Metodo per resettare tutti i filtri all'istante
     */
    public function resetFilters()
    {
        $this->searched = '';
        $this->category_id = '';
    }

    public function render()
    {
        $categories = Category::all();

        $query = Announcement::where(function($q) {
            $q->where('is_accepted', true)->orWhereNull('is_accepted');
        });

        if (!empty($this->category_id)) {
            $query->where('category_id', $this->category_id);
        }

        if (strlen(trim($this->searched)) >= 2) {
            $query->where(function($q) {
                $q->where('title', 'LIKE', "%{$this->searched}%")
                  ->orWhere('description', 'LIKE', "%{$this->searched}%")
                  ->orWhereHas('category', function($catQuery) {
                      $catQuery->where('name', 'LIKE', "%{$this->searched}%");
                  });
            });
        }

        $announcements = $query->latest()->get();

        $title = "Tutti gli Annunci";
        if (!empty($this->category_id)) {
            $currentCat = Category::find($this->category_id);
            $title = "Annunci della categoria: " . ($currentCat->name ?? '');
        }
        if (strlen(trim($this->searched)) >= 2) {
            $title = !empty($this->category_id) 
                ? $title . " - Risultati per: \"{$this->searched}\"" 
                : "Risultati della ricerca per: \"{$this->searched}\"";
        }

        return view('livewire.announcement-index', compact('announcements', 'categories', 'title'));
    }
}
