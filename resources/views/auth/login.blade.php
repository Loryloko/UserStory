<x-layout>
    <div class="container my-5 py-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                
                <div class="card shadow-sm p-4 bg-white rounded-3 border-0">
                    <h3 class="mb-4 text-center fw-bold text-dark">Accedi</h3>
                    
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <!-- Campo Email con validazione -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <!-- Campo Password -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" required>
                        </div>
                        
                        <!-- Bottone standard Bootstrap senza maiuscole forzate -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                            Accedi
                        </button>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
