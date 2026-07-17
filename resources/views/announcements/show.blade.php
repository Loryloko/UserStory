<x-layout>
    <div class="container my-5 py-4">
        
        <!-- Pulsante Torna Indietro -->
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary btn-sm fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Torna a tutti gli annunci
                </a>
            </div>
        </div>

        <div class="row g-5">
            <!-- COLONNA DI SINISTRA: Il Carosello di Immagini Segnaposto -->
            <div class="col-12 col-lg-6">
                <!-- Carosello standard Bootstrap 5 con ID unico -->
                <div id="announcementCarousel" class="carousel slide shadow-sm rounded-3 overflow-hidden bg-white" data-bs-ride="carousel">
                    
                    <!-- Indicatori inferiori -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#announcementCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#announcementCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#announcementCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos" class="d-block w-100" alt="Foto segnaposto 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos" class="d-block w-100" alt="Foto segnaposto 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos" class="d-block w-100" alt="Foto segnaposto 3">
                        </div>
                    </div>

                    <!-- Frecce di controllo Laterali -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#announcementCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Precedente</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#announcementCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Successivo</span>
                    </button>
                    
                </div>
            </div>

            <!-- COLONNA DI DESTRA: Dettagli dell'Annuncio -->
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between">
                <div>
                    <!-- Badge Categoria Protetto -->
                    @if($announcement->category)
                        <a href="{{ route('categories.show', $announcement->category) }}" class="badge bg-secondary text-decoration-none mb-3 py-2 px-3 fw-semibold">
                            {{ $announcement->category->name }}
                        </a>
                    @else
                        <span class="badge bg-warning text-dark mb-3 py-2 px-3 fw-semibold">Nessuna Categoria</span>
                    @endif

                    <!-- Titolo dell'annuncio -->
                    <h1 class="fw-bold text-dark mb-2">{{ $announcement->title }}</h1>
                    
                    <!-- Prezzo dell'annuncio evidenziato -->
                    <p class="fs-2 fw-bold text-primary mb-4">{{ number_format($announcement->price, 2) }} €</p>
                    
                    <!-- Intestazione Descrizione -->
                    <h4 class="fw-bold text-dark h6 text-uppercase tracking-wider mb-2">Descrizione dell'oggetto</h4>
                    
                    <!-- Testo della descrizione scritto dall'utente -->
                    <p class="text-secondary lh-base" style="white-space: pre-line;">
                        {{ $announcement->description }}
                    </p>
                </div>

                <!-- Informazioni di cortesia sul venditore e data -->
                <div class="border-top pt-4 mt-4 text-muted small">
                    <p class="mb-1"><i class="bi bi-person me-2"></i>Pubblicato da: <strong>{{ $announcement->user->name ?? 'Utente Anonimo' }}</strong></p>
                    <p class="mb-0"><i class="bi bi-calendar3 me-2"></i>Data inserimento: {{ $announcement->created_at->format('d/m/Y alle H:i') }}</p>
                </div>
            </div>
        </div>

    </div>
</x-layout>
