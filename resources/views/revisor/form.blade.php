<x-layout>
    <div class="container my-5 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                
                <div class="card shadow-sm p-4 bg-white border-0 rounded-3">
                    <h2 class="fw-bold text-dark mb-2 text-center">{{ __('ui.workWithUsTitle') }}</h2>
                    <p class="text-secondary small text-center mb-4">
                        {{ __('ui.workWithUsSubtitle') }}
                    </p>

                    <form action="{{ route('become.revisor.submit') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.yourNameLabel') }}</label>
                            <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">{{ __('ui.yourEmailLabel') }}</label>
                            <input type="email" class="form-control bg-light" value="{{ auth()->user()->email }}" disabled>
                            <div class="form-text text-muted">
                                {{ __('ui.adminNotificationText') }}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            {{ __('ui.submitRequestBtn') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layout>
