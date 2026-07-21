<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('announcements.create');
    }

public function index(Request $request)
{
    $categories = Category::all();
    
    $query = Announcement::where(function($q) {
        $q->where('is_accepted', true)->orWhereNull('is_accepted');
    });

    $title = "Tutti gli Annunci";

    if ($request->filled('category_id')) {
        $categoryId = $request->input('category_id');
        $query->where('category_id', $categoryId);
        
        $currentCat = Category::find($categoryId);
        if ($currentCat) {
            $title = "Annunci della categoria: " . $currentCat->name;
        }
    }

    if ($request->filled('searched')) {
        $searched = trim($request->input('searched'));
        
        $query->where(function($q) use ($searched) {
            $q->where('title', 'LIKE', "%{$searched}%")
              ->orWhere('description', 'LIKE', "%{$searched}%")
              ->orWhereHas('category', function($catQuery) use ($searched) {
                  $catQuery->where('name', 'LIKE', "%{$searched}%");
              });
        });
        
        $title = $request->filled('category_id') 
            ? $title . " - Risultati per: \"{$searched}\"" 
            : "Risultati della ricerca per: \"{$searched}\"";
    }

    $announcements = $query->latest()->get();

    return view('announcements.index', compact('announcements', 'title', 'categories'));
}


    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
