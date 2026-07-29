<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class CreateAnnouncementForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:4')]
    public $title;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $images = [];
    public $temporary_images;

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6',
        ])) {
            $this->images = [];
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    // Metodo per ripulire il form e resettare le preview delle immagini
    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category_id = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = null;
    }

    // Metodo per salvare l'annuncio nel database
    public function store()
    {
        // 1. Esegue la validazione basata sugli attributi
        $this->validate();

        // 2. Salva l'annuncio legandolo all'utente autenticato e alla categoria scelta
        $announcement = Announcement::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        // 3. Se l'utente ha inserito delle immagini, le cicla e le salva
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $announcement->images()->create([
                    'path' => $image->store('images', 'public')
                ]);
            }
        }

        // 4. Crea il messaggio di conferma flash
        session()->flash('successMessage', 'Annuncio inserito con successo!');

        // 5. Richiama il metodo custom per svuotare i campi e azzerare le miniature
        $this->cleanForm();
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-announcement-form', compact('categories'));
    }
}
