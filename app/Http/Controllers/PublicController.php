<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
	/**
	 * Example index method.
	 */
	public function home() {
    return view('home');
}
}