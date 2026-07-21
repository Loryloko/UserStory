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

    public function index(?Category $category = null)
    {
        $categories = Category::all();

        if ($category) {
            $announcements = $category->announcements()->where('is_accepted', true)->latest()->get();
            $title = "Annunci della categoria: " . $category->name;
        } else {
            $announcements = Announcement::where('is_accepted', true)->latest()->get();
            $title = "Tutti gli Annunci";
        }

        return view('announcements.index', compact('announcements', 'title', 'categories'));
    }

    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}
