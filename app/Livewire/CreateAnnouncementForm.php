<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CreateAnnouncementForm extends Component
{
     #[Validate('required|min:4')]
    public $title;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    // Metodo per salvare l'annuncio nel database
    public function store()
    {
        // 1. Esegue la validazione basata sugli attributi sopra
        $this->validate();

        // 2. Salva l'annuncio legandolo all'utente autenticato e alla categoria scelta
        Announcement::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home')->with('successMessage', 'Annuncio inserito con successo!');
        }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-announcement-form', compact('categories'));
    }
}
