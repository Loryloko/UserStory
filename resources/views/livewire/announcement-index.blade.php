<div>
    <!-- Intestazione Dinamica Reattiva -->
    <div class="row mb-4">
        <div class="col-12 text-center text-md-start">
            <h1 class="fw-bold text-dark mb-1">{{ $title }}</h1>
            <p class="text-secondary small">Filtra e cerca tra gli oggetti disponibili sul portale</p>
        </div>
    </div>
    
    <!-- 🎛️ PANNELLO DI RICERCA LIVEWIRE (Niente tag <form> per evitare ricaricamenti) -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="p-4 bg-white rounded-3 shadow-sm border border-light">
                <div class="row g-3 align-items-end">
                    
                    <!-- Campo di testo reattivo in tempo reale (User Story #10) -->
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Cerca una parola chiave (Live):</label>
                        <input 
                            wire:model.live="searched" 
                            class="form-control" 
                            type="search" 
                            placeholder="Es. Computer, Tavolo, Asus..." 
                            autocomplete="off"
                        >
                    </div>
                    
                    <!-- Menu a tendina reattivo al cambio di selezione (User Story #2) -->
                    <div class="col-12 col-md-4">
                        <label class="form-label small fw-semibold text-secondary">Seleziona Categoria:</label>
                        <select wire:model.live="category_id" class="form-select">
                            <option value="">Tutte le Categorie</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Pulsante di Reset asincrono -->
                    <div class="col-12 col-md-2">
                        <button wire:click="resetFilters" class="btn btn-outline-secondary w-100 py-2 fw-bold" type="button">
                            Reset
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Griglia degli annunci aggiornata in background via AJAX -->
    <div class="row g-4 mb-5">
        @forelse($announcements as $announcement)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 bg-white rounded-3">
                    <svg class="bd-placeholder-img card-img-top rounded-top-3" width="100%" height="220" xmlns="http://w3.org" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#6c757d"></rect>
                        <text x="50%" y="50%" fill="#dee2e6" dy=".3em" text-anchor="middle" font-weight="bold">Immagine Annuncio</text>
                    </svg>
                    
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2 align-self-start py-2 px-3 fw-semibold">
                            {{ $announcement->category->name ?? 'Nessuna Categoria' }}
                        </span>
                        
                        <h5 class="card-title fw-bold text-dark mb-2">{{ $announcement->title }}</h5>
                        <p class="card-text fw-bold text-primary fs-5 mb-2">{{ number_format($announcement->price, 2) }} €</p>
                        
                        <p class="card-text text-secondary small mb-4 flex-grow-1">
                            {{ Str::limit($announcement->description, 90) }}
                        </p>
                        
                        <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-outline-primary btn-sm w-100 py-2 fw-bold mt-auto">
                            Visualizza Dettaglio
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white rounded-3 shadow-sm">
                    <p class="fs-5 text-secondary mb-0">Nessun annuncio corrisponde ai criteri selezionati.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
