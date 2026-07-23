<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementIndex extends Component
{
    public $searched = '';
    public $category_id = '';

    protected $queryString = [
        'searched' => ['except' => ''],
        'category_id' => ['except' => '']
    ];

    public function resetFilters()
    {
        $this->searched = '';
        $this->category_id = '';
    }

    public function render()
    {
        $categories = Category::all();
        $searchTerm = trim($this->searched);

        if (strlen($searchTerm) >= 2) {
            $matchingCategoryIds = Category::where('name', 'LIKE', "%{$searchTerm}%")->pluck('id')->toArray();

            $scoutIds = Announcement::search($searchTerm)
                ->where('is_accepted', true)
                ->get()
                ->pluck('id')
                ->toArray();

            $query = Announcement::where('is_accepted', true)
                ->where(function($q) use ($scoutIds, $matchingCategoryIds) {
                    $q->whereIn('id', $scoutIds)
                      ->orWhereIn('category_id', $matchingCategoryIds);
                });

            if (!empty($this->category_id)) {
                $query->where('category_id', (int) $this->category_id);
            }
            
            $announcements = $query->latest()->get();
        } else {
            $query = Announcement::where('is_accepted', true);

            if (!empty($this->category_id)) {
                $query->where('category_id', $this->category_id);
            }

            $announcements = $query->latest()->get();
        }

        $title = "Tutti gli Annunci";
        if (!empty($this->category_id)) {
            $currentCat = Category::find($this->category_id);
            $title = "Annunci della categoria: " . ($currentCat->name ?? '');
        }
        if (strlen($searchTerm) >= 2) {
            $title = !empty($this->category_id) 
                ? $title . " - Risultati per: \"{$searchTerm}\"" 
                : "Risultati della ricerca per: \"{$searchTerm}\"";
        }

        return view('livewire.announcement-index', compact('announcements', 'categories', 'title'));
    }
}
