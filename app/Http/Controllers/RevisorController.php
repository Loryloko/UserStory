<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->oldest()->first();

        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->is_accepted = true;
        $announcement->save();

        session(['last_revised_announcement_id' => $announcement->id]);

        return redirect()->route('revisor.index')->with('successMessage', "Annuncio \"{$announcement->title}\" accettato con successo.");
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->is_accepted = false;
        $announcement->save();

        session(['last_revised_announcement_id' => $announcement->id]);

        return redirect()->route('revisor.index')->with('errorMessage', "Annuncio \"{$announcement->title}\" rifiutato.");
    }

    public function undo()
    {
        $last_id = session('last_revised_announcement_id');

        if (!$last_id) {
            return redirect()->route('revisor.index')->with('errorMessage', "Nessuna operazione da annullare.");
        }

        $announcement = Announcement::find($last_id);
        
        if ($announcement) {
            $announcement->is_accepted = null;
            $announcement->save();
        }

        session()->forget('last_revised_announcement_id');

        return redirect()->route('revisor.index')->with('successMessage', "Ultima operazione annullata. L'annuncio è tornato in revisione.");
    }
}
