<div class="position-relative w-100">
    <div class="d-flex" role="search">
        <!-- Rimosso l'attributo name per isolare completamente Livewire dagli automatismi del browser -->
        <input 
            wire:model.live="query" 
            class="form-control me-2" 
            type="search" 
            placeholder="Es. Computer, Tavolo, Asus..." 
            aria-label="Search"
            autocomplete="off"
        >
        <button wire:click="search" class="btn btn-primary fw-bold px-3 shadow-sm" type="button">Cerca</button>
    </div>

    <!-- MENU ASINCRONO DROPDOWN -->
    @if(!empty($results))
        <ul class="dropdown-menu show w-100 shadow border-0 mt-1 position-absolute" style="z-index: 1050; top: 100%; left: 0;">
            <li class="dropdown-header small text-uppercase fw-bold text-secondary pb-1" style="font-size: 0.7rem;">Suggerimenti live:</li>
            @foreach($results as $announcement)
                <li>
                    <a class="dropdown-item py-2 d-flex justify-content-between align-items-center" href="{{ route('announcements.show', $announcement) }}">
                        <div class="text-truncate me-2">
                            <strong class="text-dark d-block text-truncate small" style="font-size: 0.85rem;">{{ $announcement->title }}</strong>
                            <span class="text-muted extra-small" style="font-size: 0.75rem;">
                                In: {{ $announcement->category->name ?? 'Nessuna Categoria' }}
                            </span>
                        </div>
                        <span class="badge bg-light text-primary fw-bold shadow-sm" style="font-size: 0.75rem;">
                            {{ number_format($announcement->price, 2) }} €
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
