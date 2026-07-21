<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class SearchBar extends Component
{
    public $query = '';

    /**
     * Si esegue all'avvio: intercetta se c'è già una parola nell'URL
     * e la inserisce nella barra di ricerca allineando Livewire.
     */
    public function mount()
    {
        $this->query = request()->input('searched', '');
    }

    public function search()
    {
        if (!empty($this->query)) {
            return redirect()->route('announcements.index', ['searched' => $this->query]);
        }
        
        return redirect()->route('announcements.index');
    }

    public function render()
    {
        $results = [];

        if (strlen(trim($this->query)) >= 2) {
            $results = Announcement::where('is_accepted', true)
                ->where(function($q) {
                    $q->where('title', 'LIKE', "%{$this->query}%")
                      ->orWhere('description', 'LIKE', "%{$this->query}%")
                      ->orWhereHas('category', function($catQuery) {
                          $catQuery->where('name', 'LIKE', "%{$this->query}%");
                      });
                })
                ->latest()
                ->take(5) 
                ->get();
        }

        return view('livewire.search-bar', compact('results'));    
    }
}
