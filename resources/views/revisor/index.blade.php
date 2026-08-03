<x-layout>
    <div class="container my-5 py-4">
        
        <div class="row mb-4 align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <h1 class="fw-bold text-dark mb-1">{{ __('ui.revisorDashboardTitle') }}</h1>
                <p class="text-secondary small mb-md-0">{{ __('ui.revisorDashboardSubtitle') }}</p>
            </div>
            
            @if(session()->has('last_revised_announcement_id'))
                <div class="col-md-4 text-center text-md-end">
                    <form action="{{ route('revisor.undo') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> {{ __('ui.undoLastActionBtn') }}
                        </button>
                    </form>
                </div>
            @endif
        </div>

        @if($announcement_to_check)
            <div class="row g-5">
                
                <div class="col-12 col-lg-6">
                    <div class="row border border-4 border-info rounded shadow py-4 bg-white px-2">
                        @if($announcement_to_check->images && $announcement_to_check->images->count() > 0)
                            @foreach ($announcement_to_check->images as $key => $image)
                                <div class="col-12 px-0">
                                    <div class="card mb-3 shadow-sm border-0">
                                        <div class="row g-0 p-2 align-items-center">
                                            
                                            <!-- Colonna Immagine -->
                                            <div class="col-md-4 text-center">
                                                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-start shadow-sm" 
                                                     alt="Immagine {{ $key + 1 }} dell'articolo '{{ $announcement_to_check->title }}'">
                                            </div>

                                            <!-- Colonna Labels -->
                                            <div class="col-md-5 ps-3">
                                                <div class="card-body p-1">
                                                    <h5 class="h6 fw-bold text-dark mb-2">Labels</h5>
                                                    @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                            <span class="badge bg-light text-dark border me-1 mb-1">#{{ $label }}</span>
                                                        @endforeach
                                                    @else
                                                        <p class="text-muted small fst-italic">No labels</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Colonna Ratings -->
                                            <div class="col-md-3">
                                                <div class="card-body p-1">
                                                    <h5 class="h6 fw-bold text-dark mb-2">Ratings</h5>
                                                    
                                                    <!-- Adult -->
                                                    <div class="row justify-content-center align-items-center mb-1">
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <!-- Sostituito: Stampa l'intera stringa salvata nel database dal Job -->
                                                            <i class="{{ $image->adult }}" style="font-size: 14px;"></i>
                                                        </div>
                                                        <div class="col-10 small text-secondary ps-1">adult</div>
                                                    </div>

                                                    <!-- Violence -->
                                                    <div class="row justify-content-center align-items-center mb-1">
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <i class="{{ $image->violence }}" style="font-size: 14px;"></i>
                                                        </div>
                                                        <div class="col-10 small text-secondary ps-1">violence</div>
                                                    </div>

                                                    <!-- Spoof -->
                                                    <div class="row justify-content-center align-items-center mb-1">
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <i class="{{ $image->spoof }}" style="font-size: 14px;"></i>
                                                        </div>
                                                        <div class="col-10 small text-secondary ps-1">spoof</div>
                                                    </div>

                                                    <!-- Racy -->
                                                    <div class="row justify-content-center align-items-center mb-1">
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <i class="{{ $image->racy }}" style="font-size: 14px;"></i>
                                                        </div>
                                                        <div class="col-10 small text-secondary ps-1">racy</div>
                                                    </div>

                                                    <!-- Medical -->
                                                    <div class="row justify-content-center align-items-center mb-1">
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <i class="{{ $image->medical }}" style="font-size: 14px;"></i>
                                                        </div>
                                                        <div class="col-10 small text-secondary ps-1">medical</div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos" alt="Immagine segnaposto" class="img-fluid rounded shadow">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-6 d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge bg-secondary mb-3 py-2 px-3 fw-semibold">
                            @if($announcement_to_check->category)
                                {{ __("ui." . $announcement_to_check->category->name) }}
                            @else
                                {{ __('ui.noCategory') }}
                            @endif
                        </span>

                        <h2 class="fw-bold text-dark mb-1">{{ $announcement_to_check->title }}</h2>
                        <p class="fs-3 fw-bold text-primary mb-4">{{ number_format($announcement_to_check->price, 2) }} €</p>
                        
                        <div class="text-muted small mb-4">
                            <p class="mb-1"><i class="bi bi-person me-2"></i>{{ __('ui.postedBy') }}: {{ $announcement_to_check->user->name ?? __('ui.anonymousUser') }}</p>
                            <p class="mb-0"><i class="bi bi-calendar3 me-2"></i>{{ __('ui.dateLabel') }}: {{ $announcement_to_check->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <h4 class="h6 fw-bold text-dark text-uppercase tracking-wider mb-2">{{ __('ui.descriptionLabel') }}</h4>
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
                                    {{ __('ui.rejectAnnouncementBtn') }}
                                </button>
                            </form>
                        </div>

                        <div class="col-6">
                            <form action="{{ route('revisor.accept', $announcement_to_check) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                                    {{ __('ui.acceptAnnouncementBtn') }}
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
                        <p class="fs-5 text-secondary">{{ __('ui.noAnnouncementsToReview') }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary fw-bold px-4">{{ __('ui.backToHomeBtn') }}</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</x-layout>
