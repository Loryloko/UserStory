<x-layout>
    <div class="container my-5 py-4">
        
        <div class="row mb-4 align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <h1 class="fw-bold text-dark mb-1">Dashboard Revisore</h1>
                <p class="text-secondary small mb-md-0">Esamina gli annunci in attesa di pubblicazione</p>
            </div>
            
            @if(session()->has('last_revised_announcement_id'))
                <div class="col-md-4 text-center text-md-end">
                    <form action="{{ route('revisor.undo') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Annulla ultima azione
                        </button>
                    </form>
                </div>
            @endif
        </div>

        @if($announcement_to_check)
            <div class="row g-5">
                
                <div class="col-12 col-lg-6">
                <div class="bg-white rounded-3 shadow-sm p-2">
                    @if($announcement_to_check->images && $announcement_to_check->images->count() > 0)
                        <img src="{{ Storage::url($announcement_to_check->images->first()->path) }}" class="img-fluid rounded-3" alt="Immagine annuncio">
                    @else
                        <svg class="bd-placeholder-img card-img-top rounded-3" width="100%" height="350" xmlns="http://w3.org" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Anteprima Annuncio</title>
                            <rect width="100%" height="100%" fill="#6c757d"></rect>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em" text-anchor="middle" font-weight="bold" font-size="1.2rem">Anteprima Oggetto</text>
                        </svg>
                    @endif
                    </div>
                </div>

                <div class="col-12 col-lg-6 d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-secondary mb-3 py-2 px-3 fw-semibold">
                            {{ $announcement_to_check->category->name ?? 'Nessuna Categoria' }}
                        </span>

                        <h2 class="fw-bold text-dark mb-1">{{ $announcement_to_check->title }}</h2>
                        <p class="fs-3 fw-bold text-primary mb-4">{{ number_format($announcement_to_check->price, 2) }} €</p>
                        
                        <div class="text-muted small mb-4">
                            <p class="mb-1"><i class="bi bi-person me-2"></i>Inserito da: {{ $announcement_to_check->user->name ?? 'Utente Anonimo' }}</p>
                            <p class="mb-0"><i class="bi bi-calendar3 me-2"></i>Data: {{ $announcement_to_check->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <h4 class="h6 fw-bold text-dark text-uppercase tracking-wider mb-2">Descrizione</h4>
                        <p class="text-secondary lh-base" style="white-space: pre-line;">
                            {{ $announcement_to_check->description }}
                        </p>
                    </div>

                    <div class="row g-3 border-top pt-4 mt-4">
                        <div class="col-6">
                            <form action="{{ route('revisor.reject', $announcement_to_check) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">
                                    Rifiuta Annuncio
                                </button>
                            </form>
                        </div>

                        <div class="col-6">
                            <form action="{{ route('revisor.accept', $announcement_to_check) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                                    Accetta Annuncio
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-white rounded-3 shadow-sm">
                        <i class="bi bi-emoji-smile text-secondary display-4 mb-3"></i>
                        <p class="fs-5 text-secondary">Ottimo lavoro! Non ci sono annunci da revisionare in questo momento.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary fw-bold px-4">Torna alla Home</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</x-layout>
