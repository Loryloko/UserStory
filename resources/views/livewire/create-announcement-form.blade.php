<div class="container">
    <div class="row justify-content-center">
        <!-- Limita la larghezza della card su schermi grandi per non farla sembrare gigante -->
        <div class="col-12 col-md-8 col-lg-6">
            
            <div class="card shadow-sm p-4 bg-white border-0 rounded-3">
                <!-- Usiamo text-dark nativo al posto di text-navy -->
                <h2 class="mb-4 fw-bold text-dark text-center">Crea il tuo Annuncio</h2>
                
                   <!-- MESSAGGIO DI CONFERMA SPECIFICO PER LIVEWIRE -->
                @if (session()->has('successMessage'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center border-0 shadow-sm mb-4" role="alert">
                        <div>{{ session('successMessage') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- FORM COLLEGATO ALLA FUNZIONE STORE DI LIVEWIRE -->
                <form wire:submit.prevent="store">
                    @csrf
                    
                    <!-- Campo Titolo -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Titolo Annuncio</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Es. iPhone 15 Pro Max">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <!-- Campo Prezzo -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Prezzo (€)</label>
                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <input type="number" step="0.01" wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="0.00">
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Campo Categorie Pre-compilate -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoria</label>
                            <select wire:model="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Scegli una categoria...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Campo Descrizione -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Descrizione dell'oggetto</label>
                        <textarea wire:model="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Descrivi le condizioni dell'oggetto..."></textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Tasto di Invio Standard -->
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                        Pubblica annuncio
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
