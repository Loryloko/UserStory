@props(['announcement'])

<div class="card shadow-sm h-100 border-0 rounded-3 overflow-hidden bg-white">
    <img src="#{{ $announcement->id }}" class="card-img-top" alt="Immagine per {{ $announcement->title }}">
    
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
