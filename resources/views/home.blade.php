<x-layout>
    <div class="container my-5 py-4">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12 col-md-10 col-lg-8">
                <h1 class="display-5 fw-bold text-dark mb-3">{{ __('ui.welcomeTitle') }}</h1>
                <p class="fs-5 text-secondary mb-4">
                    {{ __('ui.welcomeSubtitle') }}
                </p>
                <div class="mb-5">
                    <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow-sm">
                        {{ __('ui.insertAnnouncement') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="row mb-4 border-top pt-5">
            <div class="col-12 text-center text-md-start">
                <h2 class="fw-bold text-dark mb-1">{{ __('ui.latestAnnouncementsTitle') }}</h2>
                <p class="text-secondary small">{{ __('ui.latestAnnouncementsSubtitle') }}</p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            @forelse($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-card :announcement="$announcement" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="fs-5 text-secondary">{{ __('ui.noAnnouncementsYet') }}</p>
                </div>
            @endforelse
        </div>

        <div class="row justify-content-center g-4 text-center border-top pt-5">
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">{{ __('ui.step1Title') }}</h3>
                <p class="small text-secondary mb-0">{{ __('ui.step1Desc') }}</p>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">{{ __('ui.step2Title') }}</h3>
                <p class="small text-secondary mb-0">{{ __('ui.step2Desc') }}</p>
            </div>
            <div class="col-12 col-md-4">
                <h3 class="h5 fw-bold text-dark">{{ __('ui.step3Title') }}</h3>
                <p class="small text-secondary mb-0">{{ __('ui.step3Desc') }}</p>
            </div>
        </div>
    </div>
</x-layout>
