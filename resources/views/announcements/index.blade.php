<x-layout>
    <div class="container my-5 py-4">
        
        <!-- Intestazione Dinamica (Mostra "Tutti gli Annunci" o il nome della categoria selezionata) -->
        <div class="row mb-4">
            <div class="col-12 text-center text-md-start">
                <h1 class="fw-bold text-dark mb-1">{{ $title }}</h1>
                <p class="text-secondary small">Esplora gli oggetti disponibili sulla nostra piattaforma</p>
            </div>
        </div>
        
         <div class="row mb-5">
            <div class="col-12">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <p class="small fw-semibold text-secondary mb-2">Filtra per Categoria:</p>
                    <!-- Contenitore flessibile che manda a capo i pulsanti in modo ordinato -->
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Pulsante per mostrare di nuovo tutti gli annunci -->
                        <a href="{{ route('announcements.index') }}" class="btn btn-sm btn-outline-dark fw-semibold px-3">
                            Mostra Tutti
                        </a>
                        
                        <!-- Ciclo per stampare le 10 categorie pre-compilate -->
                        @foreach($categories as $cat)
                            <a href="{{ route('categories.show', $cat) }}" class="btn btn-sm btn-outline-secondary fw-semibold px-3">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Griglia di tutti gli annunci dell'indice -->
        <div class="row g-4 mb-5">
            @forelse($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-white rounded-3">
                        <!-- Immagine segnaposto con dimensioni valide -->
                        <img src="https://picsum.photos" class="card-img-top rounded-top-3" alt="Immagine annuncio">
                        
                        <div class="card-body d-flex flex-column">
                            <!-- Badge della categoria -->
                            @if($announcement->category)
                                <a href="{{ route('categories.show', $announcement->category) }}" class="badge bg-secondary text-decoration-none mb-2 align-self-start py-2 px-3 fw-semibold">
                                    {{ $announcement->category->name }}
                                </a>
                            @else
                                <span class="badge bg-warning text-dark mb-2 align-self-start py-2 px-3 fw-semibold">
                                    Nessuna Categoria
                                </span>
                            @endif
                            
                            <!-- Titolo, Prezzo e Descrizione -->
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $announcement->title }}</h5>
                            <p class="card-text fw-bold text-primary fs-5 mb-2">{{ number_format($announcement->price, 2) }} €</p>
                            
                            <p class="card-text text-secondary small mb-4 flex-grow-1">
                                {{ Str::limit($announcement->description, 90) }}
                            </p>
                            
                            <!-- Bottone per andare al Dettaglio -->
                            <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-outline-primary btn-sm w-100 py-2 fw-bold mt-auto">
                                Visualizza Dettaglio
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback se per quella categoria non ci sono annunci o se il portale è vuoto -->
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-white rounded-3 shadow-sm">
                        <p class="fs-5 text-secondary mb-3">Non ci sono ancora annunci in questa sezione.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary fw-bold">Torna alla Home</a>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</x-layout>
