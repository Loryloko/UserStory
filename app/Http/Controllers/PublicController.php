<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;

class PublicController extends Controller
{
	/**
	 * Example index method.
	 */
	public function home() {

	$announcements = Announcement::latest()->take(6)->get();
    
	return view('home',compact('announcements'));
}
}