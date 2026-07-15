<div class="card shadow-sm p-4 bg-white rounded-3 border-0">
    <h2 class="mb-4 fw-bold text-navy">Crea il tuo Annuncio</h2>

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

        <!-- Tasto di Invio -->
        <button type="submit" class="btn btn-teal w-100 py-2 fw-bold text-uppercase">
            <i class="bi bi-plus-lg me-1"></i> Pubblica Annuncio
        </button>

    </form>
</div>
