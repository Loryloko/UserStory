<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class SearchBar extends Component
{
    public $query = '';

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
        $searchTerm = trim($this->query);

        if (strlen($searchTerm) >= 2) {
            $matchingCategoryIds = Category::where('name', 'LIKE', "%{$searchTerm}%")->pluck('id')->toArray();

            $scoutIds = Announcement::search($searchTerm)
                ->where('is_accepted', true)
                ->get()
                ->pluck('id')
                ->toArray();

            $results = Announcement::where('is_accepted', true)
                ->where(function($q) use ($scoutIds, $matchingCategoryIds) {
                    $q->whereIn('id', $scoutIds)
                      ->orWhereIn('category_id', $matchingCategoryIds);
                })
                ->latest()
                ->take(5)
                ->get();
        }

        return view('livewire.search-bar', compact('results'));    
    }
}
