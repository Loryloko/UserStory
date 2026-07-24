<x-layout>
    <div class="container my-5 py-4">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12 col-md-10 col-lg-8">
                <h1 class="display-5 fw-bold text-dark mb-3">Benvenuto su Presto.it</h1>
                <p class="fs-5 text-secondary mb-4">
                    La piattaforma semplice e veloce per pubblicare i tuoi annunci e dare una seconda vita ai tuoi oggetti.
                </p>
                <div class="mb-5">
                    <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow-sm">
                        Inserisci Annuncio
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb-4 border-top pt-5">
            <div class="col-12 text-center text-md-start">
                <h2 class="fw-bold text-dark mb-1">Ultimi Annunci Inseriti</h2>
                <p class="text-secondary small">Dai un'occhiata agli affari più recenti sul portale</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            @forelse($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-white rounded-3">
                        <img src="#" class="card-img-top rounded-top-3" alt="Immagine annuncio">
                        
                        <div class="card-body d-flex flex-column">
                            @if($announcement->category)
                                <a href="{{ route('categories.show', $announcement->category) }}" class="badge bg-secondary text-decoration-none mb-2 align-self-start py-2 px-3 fw-semibold">
                                    {{ $announcement->category->name }}
                                </a>
                            @else
                                <span class="badge bg-warning text-dark mb-2 align-self-start py-2 px-3 fw-semibold">
                                    Nessuna Categoria
                                </span>
                            @endif
                            
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
                    <p class="fs-5 text-secondary">Non ci sono ancora annunci disponibili. Sii il primo a pubblicarne uno!</p>
                </div>
            @endforelse
        </div>

        <div class="row justify-content-center g-4 text-center border-top pt-5">
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">1. Registrati</h3>
                <p class="small text-secondary mb-0">Crea un account in pochi secondi per accedere a tutte le funzionalità della piattaforma.</p>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">2. Scegli la Categoria</h3>
                <p class="small text-secondary mb-0">Seleziona una delle 10 categorie pre-compilate disponibili per il tuo oggetto.</p>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">3. Pubblica</h3>
                <p class="small text-secondary mb-0">Inserisci titolo, prezzo e descrizione per rendere subito visibile il tuo annuncio.</p>
            </div>
        </div>
    </div>
</x-layout>
