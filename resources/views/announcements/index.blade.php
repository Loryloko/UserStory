<x-layout>
    <div class="container my-5 py-4">
        
        <div class="card shadow-sm border-0 p-4 mb-5 bg-light rounded-3">
            <form action="{{ route('announcements.search') }}" method="GET" class="row g-3 align-items-center">
                
                <div class="col-12 col-md-5">
                    <label class="form-label small fw-bold text-secondary text-uppercase">Cosa stai cercando?</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input 
                            type="text" 
                            name="query" 
                            class="form-control border-start-0" 
                            placeholder="Es. Computer, Tavolo, Asus..." 
                            value="{{ request('query') }}"
                            autocomplete="off"
                        >
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label small fw-bold text-secondary text-uppercase">Categoria</label>
                    <select name="category_id" class="form-select">
                        <option value="">Tutte le categorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-3 d-flex align-items-end h-100 mt-md-4 pt-md-2">
                    <button type="submit" class="btn btn-primary fw-bold w-100 me-2 shadow-sm">
                        Cerca
                    </button>
                    @if(request()->filled('query') || request()->filled('category_id'))
                        <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary shadow-sm">
                            Reset
                        </a>
                    @endif
                </div>

            </form>
        </div>

        <h2 class="mb-4 fw-bold text-dark">{{ $title }}</h2>

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
                    <h4 class="text-muted fw-semibold">Nessun annuncio trovato.</h4>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->appends(request()->query())->links() }}
        </div>

    </div>
</x-layout>
