<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Mail\BecomeRevisorMail;          
use Illuminate\Support\Facades\Mail;   
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
	/**
	 * Example index method.
	 */
	public function home() {

    $announcements = Announcement::where('is_accepted', true)->latest()->take(6)->get();
    
	return view('home',compact('announcements'));
	}
 	/**
     *Mostra la vista del form "Lavora con noi"
     */
    public function becomeRevisorForm()
    {
        return view('revisor.form');
    }

    /**
    *Invia la mail a Mailtrap al submit del form
     */
    public function becomeRevisorSubmit()
    {
        $user = Auth::user();

        Mail::to('admin@presto.it')->send(new BecomeRevisorMail($user));

        return redirect()->route('home')->with('successMessage', 'Richiesta inviata con successo! Il team valuterà il tuo profilo.');
    }
}