<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;
use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use App\Jobs\ResizeImage; 

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

        // 3. Se l'utente ha inserito delle immagini, le cicla, le salva e lancia il Job
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                // Costruisce il percorso dinamico basato sull'id dell'annuncio
                $newFileName = "announcements/{$announcement->id}";

                // Salva l'immagine fisica nel disco public e crea il record relazionato
                $newImage = $announcement->images()->create([
                    'path' => $image->store($newFileName, 'public')
                ]);

                // Invia il Job alla coda passando il path salvato e le dimensioni del crop
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }

            File::deleteDirectory(storage_path('app/livewire-tmp'));
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
