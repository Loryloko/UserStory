<x-layout>
    <div class="container my-5 py-4">
        
        <div class="mb-4">
            <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary btn-sm fw-bold">
                <i class="bi bi-arrow-left me-1"></i> Torna a tutti gli annunci
            </a>
        </div>
        
        <h2 class="mb-4 fw-bold text-dark">
            Risultati della ricerca per: <span class="text-primary">"{{ $requestedSearch }}"</span>
        </h2>

        <div class="row">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0 rounded-3 overflow-hidden bg-white">
                        <img src="https://picsum.photos{{ $announcement->id }}" class="card-img-top" alt="Immagine per {{ $announcement->title }}">
                        
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div>
                                <span class="badge bg-secondary mb-2 small fw-semibold">
                                    {{ $announcement->category->name ?? 'Nessuna Categoria' }}
                                </span>
                                <h5 class="card-title fw-bold text-dark text-truncate mb-2">{{ $announcement->title }}</h5>
                                <p class="card-text text-primary fw-bold fs-5 mb-0">{{ number_format($announcement->price, 2) }} €</p>
                            </div>
                            
                            <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-outline-primary btn-sm mt-3 w-100 fw-bold py-2">
                                Vedi Dettaglio
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted fw-semibold">Nessun annuncio corrisponde ai criteri di ricerca.</h4>
                    <p class="text-secondary small">Controlla l'ortografia o prova a cercare termini diversi.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->appends(['query' => $requestedSearch])->links() }}
        </div>

    </div>
</x-layout>
