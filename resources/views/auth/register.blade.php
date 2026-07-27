<x-layout>
    <div class="container my-5 py-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-5">
                
                <div class="card shadow-sm p-4 bg-white rounded-3 border-0">
                    <h3 class="mb-4 text-center fw-bold text-dark">{{ __('ui.registerTitle') }}</h3>
                    
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.fullNameLabel') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.yourEmailLabel') }}</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.passwordLabel') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">{{ __('ui.passwordConfirmationLabel') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            {{ __('ui.registerBtn') }}
                        </button>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
