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
        $query = $request->input('query');
        $categoryId = $request->input('category_id');

        $dbQuery = Announcement::where('is_accepted', true);

        if (!empty($query)) {
            $announcementIds = Announcement::search($query)->keys();
            $dbQuery->whereIn('id', $announcementIds);
        }

        if (!empty($categoryId)) {
            $dbQuery->where('category_id', $categoryId);
        }

        $announcements = $dbQuery->latest()->paginate(10);

        return view('announcements.searched', ['announcements' => $announcements, 'query' => $query ?? '']);
    }
   

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
