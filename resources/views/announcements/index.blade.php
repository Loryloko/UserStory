<x-layout>
    <div class="container my-5 py-4">
        
        <div class="card shadow-sm border-0 p-4 mb-5 bg-light rounded-3">
            <form action="{{ route('announcements.search') }}" method="GET" class="row g-3 align-items-end">
                
                <div class="col-12 col-md-5">
                    <label class="form-label small fw-bold text-secondary text-uppercase">{{ __('ui.whatAreYouLookingFor') }}</label>
                    <input type="search" name="query" class="form-control" placeholder="{{ __('ui.searchPlaceholder') }}" aria-label="search" value="{{ request('query') }}">
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label small fw-bold text-secondary text-uppercase">{{ __('ui.categoryLabel') }}</label>
                    <select name="category_id" class="form-select custom-select">
                        <option value="">{{ __('ui.allCategories') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ __("ui.$category->name") }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-3 d-flex">
                    <button type="submit" class="btn btn-teal fw-bold w-100 me-2 shadow-sm">
                        <i class="bi bi-search me-1"></i> {{ __('ui.search') }}
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
                    <x-card :announcement="$announcement" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted fw-semibold">{{ __('ui.noAnnouncementsFound') }}</h4>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->appends(request()->query())->links() }}
        </div>

    </div>
    
</x-layout>
