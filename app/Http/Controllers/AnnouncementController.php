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

    public function index(Request $request, Category $category = null)
{
    $categories = Category::all();
    $title = "Tutti gli Annunci";

    $query = Announcement::where('is_accepted', true);

    if ($category && $category->exists) {
        $query->where('category_id', $category->id);
        $title = "Annunci della categoria: " . $category->name;
    } elseif ($request->filled('category_id')) {
        $categoryId = $request->input('category_id');
        $query->where('category_id', $categoryId);
        
        $currentCat = Category::find($categoryId);
        if ($currentCat) {
            $title = "Annunci della categoria: " . $currentCat->name;
        }
    }

    $announcements = $query->latest()->paginate(6);

    return view('announcements.index', compact('announcements', 'title', 'categories'));
}


   public function search(Request $request)
    {
    $requestedSearch = $request->input('query');

    $announcements = Announcement::search($requestedSearch)
        ->where('is_accepted', true) 
        ->query(function ($builder) use ($requestedSearch) {
            $builder->select('announcements.*')
                ->join('categories', 'announcements.category_id', '=', 'categories.id')
                ->orWhere('categories.name', 'LIKE', "%{$requestedSearch}%");
        })
        ->paginate(6); 

    return view('announcements.searched', compact('announcements', 'requestedSearch'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
