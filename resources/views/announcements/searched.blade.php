<x-layout>
    <div class="container my-5 py-4">
        <div class="mb-4">
            <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary btn-sm fw-bold">
                <i class="bi bi-arrow-left me-1"></i> {{ __('ui.backToAllAnnouncements') }}
            </a>
        </div>
        
        <h2 class="mb-4 fw-bold text-dark">
            {{ __('ui.searchResultsFor') }}: <span class="text-primary">"{{ $query }}"</span>
        </h2>

        <div class="row">
            @forelse ($announcements as $announcement)
                <div class="col-12 col-md-4 mb-4">
                    <x-card :announcement="$announcement" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted fw-semibold">{{ __('ui.noSearchMatch') }}</h4>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->appends(['query' => $query])->links() }}
        </div>
    </div>
</x-layout>
